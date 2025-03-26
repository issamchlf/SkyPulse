<?php

namespace Tests\Unit\Models;

use App\Models\Flight;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    public function testIt_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $reservation->user);
        $this->assertEquals($user->id, $reservation->user->id);
    }

    public function testIt_belongs_to_a_flight()
    {
        $flight = Flight::factory()->create();
        $reservation = Reservation::factory()->create(['flight_id' => $flight->id]);

        $this->assertInstanceOf(Flight::class, $reservation->flight);
        $this->assertEquals($flight->id, $reservation->flight->id);
    }

    public function testIt_has_required_attributes()
    {
        $reservation = Reservation::factory()->create([
            'seats' => 2,
            'status' => 'pending',
            'total_price' => 500.00
        ]);

        $this->assertEquals(2, $reservation->seats);
        $this->assertEquals('pending', $reservation->status);
        $this->assertEquals(500.00, $reservation->total_price);
    }

    public function testIt_can_be_created_with_valid_data()
    {
        $user = User::factory()->create();
        $flight = Flight::factory()->create();
        
        $reservation = Reservation::create([
            'user_id' => $user->id,
            'flight_id' => $flight->id,
            'seats' => 2,
            'status' => 'pending',
            'total_price' => 500.00
        ]);

        $this->assertDatabaseHas('reservations', [
            'id' => $reservation->id,
            'user_id' => $user->id,
            'flight_id' => $flight->id,
            'seats' => 2,
            'status' => 'pending',
            'total_price' => 500.00
        ]);
    }

    public function testIt_can_update_status()
    {
        $reservation = Reservation::factory()->create(['status' => 'pending']);
        
        $reservation->update(['status' => 'confirmed']);
        
        $this->assertEquals('confirmed', $reservation->fresh()->status);
    }

    public function testIt_can_calculate_total_price()
    {
        $flight = Flight::factory()->create(['price' => 250.00]);
        $seats = 2;
        
        $reservation = Reservation::create([
            'user_id' => User::factory()->create()->id,
            'flight_id' => $flight->id,
            'seats' => $seats,
            'status' => 'pending',
            'total_price' => $flight->price * $seats
        ]);

        $this->assertEquals($flight->price * $seats, $reservation->total_price);
    }

    public function testIt_can_be_cancelled()
    {
        $reservation = Reservation::factory()->create(['status' => 'pending']);
        
        $reservation->update(['status' => 'canceled']);
        
        $this->assertEquals('canceled', $reservation->fresh()->status);
    }
} 