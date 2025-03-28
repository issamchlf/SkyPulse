<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition(): array
    {
        $flight = Flight::factory()->create();
        $seats = fake()->numberBetween(1, 4);
        
        return [
            'user_id' => User::factory(),
            'flight_id' => $flight->id,
            'seats' => $seats,
            'status' => fake()->randomElement(['pending', 'confirmed', 'canceled']),
            'total_price' => $flight->price * $seats,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
} 