<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Carbon\Carbon;

class FlightControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_list_all_flights()
    {
        $flights = Flight::factory(3)->create();

        $response = $this->getJson('/api/flights');

        $response->assertStatus(200)
            ->assertJsonCount(3)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'plane_id',
                    'flight_number',
                    'departure_airport',
                    'arrival_airport',
                    'departure_time',
                    'arrival_time',
                    'price',
                    'available_seats',
                    'status',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    /** @test */
    public function it_can_create_a_new_flight()
    {
        $plane = Plane::factory()->create();
        $departureTime = Carbon::now()->addDays(1)->format('Y-m-d H:i:s');
        $arrivalTime = Carbon::now()->addDays(2)->format('Y-m-d H:i:s');
        
        $flightData = [
            'plane_id' => $plane->id,
            'flight_number' => $this->faker->unique()->numerify('FL###'),
            'departure_airport' => $this->faker->city,
            'arrival_airport' => $this->faker->city,
            'departure_time' => $departureTime,
            'arrival_time' => $arrivalTime,
            'price' => $this->faker->numberBetween(100, 1000),
            'available_seats' => $this->faker->numberBetween(50, 200),
            'status' => true
        ];

        $response = $this->postJson('/api/flights', $flightData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'plane_id',
                'flight_number',
                'departure_airport',
                'arrival_airport',
                'departure_time',
                'arrival_time',
                'price',
                'available_seats',
                'status',
                'created_at',
                'updated_at'
            ]);

        $this->assertDatabaseHas('flights', [
            'flight_number' => $flightData['flight_number'],
            'departure_airport' => $flightData['departure_airport']
        ]);
    }

    /** @test */
    public function it_validates_required_fields_for_flight_creation()
    {
        $response = $this->postJson('/api/flights', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'plane_id',
                'flight_number',
                'departure_airport',
                'arrival_airport',
                'departure_time',
                'arrival_time',
                'price',
                'available_seats',
                'status'
            ]);
    }

    /** @test */
    public function it_can_show_a_specific_flight()
    {
        $flight = Flight::factory()->create();

        $response = $this->getJson("/api/flights/{$flight->id}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'plane_id',
                'flight_number',
                'departure_airport',
                'arrival_airport',
                'departure_time',
                'arrival_time',
                'price',
                'available_seats',
                'status',
                'created_at',
                'updated_at'
            ]);
    }

    /** @test */
    public function it_returns_404_for_non_existent_flight()
    {
        $response = $this->getJson('/api/flights/99999');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_update_a_flight()
    {
        $flight = Flight::factory()->create();
        $updateData = [
            'status' => false,
            'price' => 500
        ];

        $response = $this->putJson("/api/flights/{$flight->id}", $updateData);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'status' => false,
                'price' => 500
            ]);

        $this->assertDatabaseHas('flights', [
            'id' => $flight->id,
            'status' => false,
            'price' => 500
        ]);
    }

    /** @test */
    public function it_can_delete_a_flight()
    {
        $flight = Flight::factory()->create();

        $response = $this->deleteJson("/api/flights/{$flight->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('flights', [
            'id' => $flight->id
        ]);
    }
} 