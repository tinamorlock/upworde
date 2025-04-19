<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StatusUpdate>
 */
class StatusUpdateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $messages = [
            'Editing started',
            'Upload received',
            'Waiting for client feedback',
            'Completed initial review',
            'Final edits submitted',
            'Marked as complete',
        ];
        return [
            'upword_id' => \App\Models\Upword::factory(), // or assign manually
            'message' => $this->faker->randomElement($messages),
            'posted_at' => $this->faker->dateTimeBetween('-5 days', 'now'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
