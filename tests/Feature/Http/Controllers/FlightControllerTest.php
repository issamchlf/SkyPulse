<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Flight;
use App\Models\Plane;
use App\Models\User;
use App\Models\Admin;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Carbon\Carbon;

class FlightControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $admin;
    private $user;
    private $flight;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->admin = Admin::factory()->create();
        $this->user = User::factory()->create();
        $this->flight = Flight::factory()->create();
    }

    public function test_can_view_flights_index()
    {
        $response = $this->actingAs($this->user)
            ->get(route('flights'));

        $response->assertStatus(200);
        $response->assertViewIs('flight');
    }

    public function test_can_filter_flights_by_price_range()
    {
        Flight::factory()->create(['price' => 100]);
        Flight::factory()->create(['price' => 200]);
        Flight::factory()->create(['price' => 300]);

        $response = $this->actingAs($this->user)
            ->get(route('flights', [
                'min_price' => 150,
                'max_price' => 250
            ]));

        $response->assertStatus(200);
        $response->assertViewHas('flights');
        $this->assertEquals(1, $response->viewData('flights')->count());
    }

    public function test_can_filter_flights_by_time()
    {
        $morning = Carbon::now()->setTime(8, 0);
        $afternoon = Carbon::now()->setTime(14, 0);
        $evening = Carbon::now()->setTime(20, 0);

        Flight::factory()->create(['departure_time' => $morning]);
        Flight::factory()->create(['departure_time' => $afternoon]);
        Flight::factory()->create(['departure_time' => $evening]);

        $response = $this->actingAs($this->user)
            ->get(route('flights', ['time' => 'morning']));

        $response->assertStatus(200);
        $this->assertEquals(1, $response->viewData('flights')->count());
    }

    public function test_admin_can_access_flight_creation_form()
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->get(route('admin.flights.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.flight.create');
    }



    public function test_can_create_new_flight()
    {
        $plane = Plane::factory()->create();
        $flightData = [
            'plane_id' => $plane->id,
            'flight_number' => $this->faker->unique()->numerify('FL###'),
            'departure_airport' => $this->faker->city,
            'arrival_airport' => $this->faker->city,
            'departure_time' => Carbon::now()->addDays(1),
            'arrival_time' => Carbon::now()->addDays(2),
            'price' => $this->faker->numberBetween(100, 1000),
            'available_seats' => $this->faker->numberBetween(50, 200),
            'status' => true
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('store.flight'), $flightData);

        $response->assertRedirect();
        $this->assertDatabaseHas('flights', [
            'flight_number' => $flightData['flight_number']
        ]);
    }

    public function test_can_view_flight_details()
    {
        $response = $this->actingAs($this->user)
            ->get(route('flights.show', $this->flight->id));

        $response->assertStatus(200);
        $response->assertViewIs('flights.show');
        $response->assertViewHas('flight');
    }


    public function test_can_book_flight()
    {
        $bookingData = [
            'seats' => 2
        ];

        $response = $this->actingAs($this->user)
            ->post(route('flights.book', $this->flight->id), $bookingData);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('reservations', [
            'user_id' => $this->user->id,
            'flight_id' => $this->flight->id,
            'seats' => 2,
            'status' => 'pending'
        ]);
        $this->assertEquals(
            $this->flight->available_seats - 2,
            $this->flight->fresh()->available_seats
        );
    }

    public function test_cannot_book_flight_without_authentication()
    {
        $response = $this->post(route('flights.book', $this->flight->id), [
            'seats' => 2
        ]);

        $response->assertRedirect(route('login'));
    }



  


} 
