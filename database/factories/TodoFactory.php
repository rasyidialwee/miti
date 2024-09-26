<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid,
            'name' => fake()->name,
            'description' => fake()->sentence,
            'image_path' => fake()->imageUrl(100, 100),
            'is_completed' => fake()->boolean,
            'completed_at' => fake()->dateTime,
            'user_id' => User::factory(),
        ];
    }
}
