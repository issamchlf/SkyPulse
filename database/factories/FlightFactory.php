<?php

namespace Database\Factories;

use App\Models\Plane;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plane_id' => Plane::factory(),
            'flight_number' => strtoupper(Str::random(6)),
            'departure_airport' => $this->faker->city,
            'arrival_airport' => $this->faker->city,
            'departure_time' => $this->faker->dateTimeBetween('+1 day', '+2 months'),
            'arrival_time' => $this->faker->dateTimeBetween('+2 days', '+3 months'),
            'price' => $this->faker->randomFloat(2, 100, 2000),
            'available_seats' => $this->faker->numberBetween(50, 300),
            'status' => $this->faker->boolean,
        ];
    }
}
