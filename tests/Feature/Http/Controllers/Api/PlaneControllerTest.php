<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use App\Models\Plane;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class PlaneControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIt_can_list_all_planes()
    {
        $planes = Plane::factory(3)->create();

        $response = $this->getJson('/api/planes');

        $response->assertStatus(200)
            ->assertJsonCount(3)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'type',
                    'max_seats',
                    'picture',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    public function testIt_can_create_a_new_plane()
    {
        $planeData = [
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement(['Boeing', 'Airbus', 'Embraer']),
            'max_seats' => $this->faker->numberBetween(100, 500),
            'picture' => $this->faker->imageUrl(640, 480, 'airplane')
        ];

        $response = $this->postJson('/api/planes', $planeData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'type',
                'max_seats',
                'picture',
                'created_at',
                'updated_at'
            ]);

        $this->assertDatabaseHas('planes', [
            'name' => $planeData['name'],
            'type' => $planeData['type']
        ]);
    }

    public function testIt_validates_required_fields_for_plane_creation()
    {
        $response = $this->postJson('/api/planes', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'name',
                'type',
                'max_seats',
                'picture'
            ]);
    }

    public function testIt_can_show_a_specific_plane()
    {
        $plane = Plane::factory()->create();

        $response = $this->getJson("/api/planes/{$plane->id}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'type',
                'max_seats',
                'picture',
                'created_at',
                'updated_at'
            ]);
    }

    public function testIt_returns_404_for_non_existent_plane()
    {
        $response = $this->getJson('/api/planes/99999');

        $response->assertStatus(404);
    }

    public function testIt_can_update_a_plane()
    {
        $plane = Plane::factory()->create();
        $updateData = [
            'name' => 'Updated Plane Name',
            'max_seats' => 300
        ];

        $response = $this->putJson("/api/planes/{$plane->id}", $updateData);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Updated Plane Name',
                'max_seats' => 300
            ]);

        $this->assertDatabaseHas('planes', [
            'id' => $plane->id,
            'name' => 'Updated Plane Name',
            'max_seats' => 300
        ]);
    }

    public function testIt_can_delete_a_plane()
    {
        $plane = Plane::factory()->create();

        $response = $this->deleteJson("/api/planes/{$plane->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('planes', [
            'id' => $plane->id
        ]);
    }

    public function testIt_validates_max_seats_is_numeric()
    {
        $planeData = [
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement(['Boeing', 'Airbus', 'Embraer']),
            'max_seats' => 'not-a-number',
            'picture' => $this->faker->imageUrl(640, 480, 'airplane')
        ];

        $response = $this->postJson('/api/planes', $planeData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['max_seats']);
    }
} 