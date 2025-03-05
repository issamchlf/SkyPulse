<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plane>
 */
class PlaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->word,
            'max_seats' => $this->faker->randomNumber(),
            'picture' => $this->faker->imageUrl(640, 480, 'airplane', true, 'Faker'),
        ];
    }
}
