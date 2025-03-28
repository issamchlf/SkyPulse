<?php

namespace Database\Seeders;

use App\Models\Plane;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class planeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use RefreshDatabase;
    public function run(): void
    {

        DB::table('planes')->insert([
            [
                'name' => 'Boeing 737',
                'type' => 'Jet',
                'max_seats' => 150,
                'picture' => 'raian.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Airbus A320',
                'type' => 'Jet',
                'max_seats' => 180,
                'picture' => 'airbusa320.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Embraer E190',
                'type' => 'Jet',
                'max_seats' => 100,
                'picture' => 'embraere190.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cessna 172',
                'type' => 'Propeller',
                'max_seats' => 4,
                'picture' => 'cessna172.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Boeing 747',
                'type' => 'Jet',
                'max_seats' => 410,
                'picture' => 'boeing747.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Airbus A380',
                'type' => 'Jet',
                'max_seats' => 615,
                'picture' => 'airbusa380.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gulfstream G650',
                'type' => 'Private Jet',
                'max_seats' => 18,
                'picture' => 'gulfstreamg650.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
