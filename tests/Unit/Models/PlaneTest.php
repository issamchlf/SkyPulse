<?php

namespace Tests\Unit\Models;

use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlaneTest extends TestCase
{
    use RefreshDatabase;

    
    public function testIt_has_required_attributes()
    {
        $plane = Plane::factory()->create([
            'name' => 'Boeing 737',
            'type' => 'Boeing',
            'max_seats' => 180,
            'picture' => 'planes/boeing-737.jpg'
        ]);

        $this->assertEquals('Boeing 737', $plane->name);
        $this->assertEquals('Boeing', $plane->type);
        $this->assertEquals(180, $plane->max_seats);
        $this->assertEquals('planes/boeing-737.jpg', $plane->picture);
    }

    public function testIt_can_be_created_with_valid_data()
    {
        $plane = Plane::create([
            'name' => 'Airbus A320',
            'type' => 'Airbus',
            'max_seats' => 150,
            'picture' => 'planes/airbus-a320.jpg'
        ]);

        $this->assertDatabaseHas('planes', [
            'id' => $plane->id,
            'name' => 'Airbus A320',
            'type' => 'Airbus',
            'max_seats' => 150,
            'picture' => 'planes/airbus-a320.jpg'
        ]);
    }

    public function testIt_can_have_multiple_flights()
    {
        $plane = Plane::factory()->create();
        $flights = Flight::factory()->count(3)->create(['plane_id' => $plane->id]);

        $this->assertCount(3, $plane->Flights);
        $this->assertInstanceOf(Flight::class, $plane->Flights->first());
        $this->assertEquals($plane->id, $plane->Flights->first()->plane_id);
    }

    public function testIt_can_update_its_attributes()
    {
        $plane = Plane::factory()->create([
            'name' => 'Boeing 737',
            'max_seats' => 180
        ]);

        $plane->update([
            'name' => 'Boeing 737-800',
            'max_seats' => 200
        ]);

        $this->assertEquals('Boeing 737-800', $plane->fresh()->name);
        $this->assertEquals(200, $plane->fresh()->max_seats);
    }

    public function testIt_can_be_deleted()
    {
        $plane = Plane::factory()->create();
        
        $plane->delete();
        
        $this->assertDatabaseMissing('planes', [
            'id' => $plane->id
        ]);
    }

    public function testIt_can_have_null_picture()
    {
        $plane = Plane::factory()->create([
            'picture' => null
        ]);

        $this->assertNull($plane->picture);
    }

    public function testIt_can_be_created_without_picture()
    {
        $plane = Plane::create([
            'name' => 'Embraer E190',
            'type' => 'Embraer',
            'max_seats' => 100
        ]);

        $this->assertDatabaseHas('planes', [
            'id' => $plane->id,
            'name' => 'Embraer E190',
            'type' => 'Embraer',
            'max_seats' => 100,
            'picture' => null
        ]);
    }
} 