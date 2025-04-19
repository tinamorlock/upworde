<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Upload>
 */
class UploadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'upword_id' => \App\Models\Upword::factory(), // or pass in an existing one
            'filename' => $this->faker->lexify('document_????.docx'),
            'path' => 'uploads/' . $this->faker->uuid() . '.docx', // simulate file path
            'word_count' => $this->faker->numberBetween(100, 4000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
