<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subscription;
use App\Models\Upword;
use App\Models\Upload;
use App\Models\StatusUpdate;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 2 users with everything tied together
        User::factory(2)->create()->each(function ($user) {
            // Add a subscription
            Subscription::factory()->create([
                'user_id' => $user->id,
            ]);

            // Add 2 upwords per user
            Upword::factory(2)->create([
                'user_id' => $user->id,
            ])->each(function ($upword) {
                // Upload file to each upword
                Upload::factory()->create([
                    'upword_id' => $upword->id,
                ]);

                // Add 1 status update per upword
                StatusUpdate::factory()->create([
                    'upword_id' => $upword->id,
                ]);
            });
        });
    }
}
