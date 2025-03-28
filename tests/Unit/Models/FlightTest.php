<?php

namespace Tests\Unit\Models;

use App\Models\Flight;
use App\Models\Plane;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlightTest extends TestCase
{
    use RefreshDatabase;


    public function testIt_has_required_attributes()
    {
        $flight = Flight::factory()->create([
            'flight_number' => 'FL123',
            'departure_airport' => 'JFK',
            'arrival_airport' => 'LAX',
            'departure_time' => '2024-04-01 10:00:00',
            'arrival_time' => '2024-04-01 13:00:00',
            'available_seats' => 150,
            'price' => 299.99,
            'status' => true
        ]);

        $this->assertEquals('FL123', $flight->flight_number);
        $this->assertEquals('JFK', $flight->departure_airport);
        $this->assertEquals('LAX', $flight->arrival_airport);
        $this->assertEquals('2024-04-01 10:00:00', $flight->departure_time);
        $this->assertEquals('2024-04-01 13:00:00', $flight->arrival_time);
        $this->assertEquals(150, $flight->available_seats);
        $this->assertEquals(299.99, $flight->price);
        $this->assertTrue($flight->status);
    }

    public function testIt_belongs_to_a_plane()
    {
        $plane = Plane::factory()->create();
        $flight = Flight::factory()->create(['plane_id' => $plane->id]);

        $this->assertInstanceOf(Plane::class, $flight->plane);
        $this->assertEquals($plane->id, $flight->plane->id);
    }

    public function testIt_can_have_multiple_users()
    {
        $flight = Flight::factory()->create();
        $users = User::factory()->count(3)->create();
        
        foreach ($users as $user) {
            $flight->users()->attach($user->id, [
                'seats' => 1,
                'total_price' => $flight->price
            ]);
        }

        $this->assertCount(3, $flight->users);
        $this->assertInstanceOf(User::class, $flight->users->first());
        $this->assertEquals($flight->price, $flight->users->first()->pivot->total_price);
    }

    public function testIt_can_be_created_with_valid_data()
    {
        $plane = Plane::factory()->create();
        
        $flight = Flight::create([
            'plane_id' => $plane->id,
            'flight_number' => 'FL456',
            'departure_airport' => 'ORD',
            'arrival_airport' => 'MIA',
            'departure_time' => '2024-04-02 14:00:00',
            'arrival_time' => '2024-04-02 17:00:00',
            'available_seats' => 180,
            'price' => 399.99,
            'status' => true
        ]);

        $this->assertDatabaseHas('flights', [
            'id' => $flight->id,
            'plane_id' => $plane->id,
            'flight_number' => 'FL456',
            'departure_airport' => 'ORD',
            'arrival_airport' => 'MIA',
            'departure_time' => '2024-04-02 14:00:00',
            'arrival_time' => '2024-04-02 17:00:00',
            'available_seats' => 180,
            'price' => 399.99,
            'status' => true
        ]);
    }

    public function testIt_can_update_its_attributes()
    {
        $flight = Flight::factory()->create([
            'available_seats' => 150,
            'price' => 299.99
        ]);

        $flight->update([
            'available_seats' => 140,
            'price' => 349.99
        ]);

        $this->assertEquals(140, $flight->fresh()->available_seats);
        $this->assertEquals(349.99, $flight->fresh()->price);
    }

    public function testIt_can_be_deleted()
    {
        $flight = Flight::factory()->create();
        
        $flight->delete();
        
        $this->assertDatabaseMissing('flights', [
            'id' => $flight->id
        ]);
    }

    public function testIt_can_be_cancelled()
    {
        $flight = Flight::factory()->create(['status' => true]);
        
        $flight->update(['status' => false]);
        
        $this->assertEquals(0, $flight->fresh()->status);
    }

    public function testIt_can_update_available_seats()
    {
        $flight = Flight::factory()->create(['available_seats' => 150]);
        
        $flight->update(['available_seats' => 145]);
        
        $this->assertEquals(145, $flight->fresh()->available_seats);
    }

    public function testIt_can_have_unique_flight_number()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Flight::create([
            'plane_id' => Plane::factory()->create()->id,
            'flight_number' => 'FL789',
            'departure_airport' => 'DFW',
            'arrival_airport' => 'SEA',
            'departure_time' => '2024-04-03 09:00:00',
            'arrival_time' => '2024-04-03 12:00:00',
            'available_seats' => 160,
            'price' => 449.99,
            'status' => true
        ]);

        Flight::create([
            'plane_id' => Plane::factory()->create()->id,
            'flight_number' => 'FL789', // Same flight number
            'departure_airport' => 'DFW',
            'arrival_airport' => 'SEA',
            'departure_time' => '2024-04-03 09:00:00',
            'arrival_time' => '2024-04-03 12:00:00',
            'available_seats' => 160,
            'price' => 449.99,
            'status' => true
        ]);
    }
} 