<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'phone' => $this->faker->phoneNumber(),
            'st_address_1' => $this->faker->streetAddress(),
            'st_address_2' => '',
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'country' => $this->faker->country(),
            'zip' => $this->faker->postcode(),

            'web_url' => $this->faker->url(),
            'ig_url' => $this->faker->url(),
            'fb_url' => $this->faker->url(),
            'x_url' => $this->faker->url(),
            'substack_url' => $this->faker->url(),
            'tiktok_url' => $this->faker->url(),
            'amazon_url' => $this->faker->url(),
            'pin_url' => $this->faker->url(),
            'medium_url' => $this->faker->url(),
            'youtube_url' => $this->faker->url(),

            'writer_type' => $this->faker->randomElement(['fiction', 'nonfiction', 'blogger']),
            'bio' => $this->faker->paragraph(),

            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
