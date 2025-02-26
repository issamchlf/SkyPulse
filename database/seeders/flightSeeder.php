<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Foundation\Testing\RefreshDatabase;

class flightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use RefreshDatabase;
    public function run(): void
    {
        Flight::factory(10)->create();
    }
}
