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
        Plane::factory(10)->create();

        DB::table('planes')->insert([
            'name' => 'Sample Plane',
            'type' => 'Jet',
            'max_seats' => 150,
            'picture' => 'https://via.placeholder.com/640x480.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
