<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Upword>
 */
class UpwordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['pending', 'in_progress', 'complete']);

        return [
            'user_id' => \App\Models\User::factory(), // or pass in an existing user_id
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'word_count' => $this->faker->numberBetween(250, 4000),
            'status' => $status,
            'submitted_at' => $status !== 'pending' ? $this->faker->dateTimeBetween('-10 days', '-3 days') : null,
            'completed_at' => $status === 'complete' ? $this->faker->dateTimeBetween('-2 days', 'now') : null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
