<?php

namespace Database\Seeders;

use App\Models\Follow;
use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 28; $i++) {
            if ($i === 1) {
            } else {
                Follow::factory()->create([
                    'followers_id' => 1,
                    'following_id' => $i,
                ]);
            }
        }
        for ($i = 1; $i <= 28; $i++) {
            if ($i === 2) {
            } else {
                Follow::factory()->create([
                    'followers_id' => 2,
                    'following_id' => $i,
                ]);
            }
        }
        for ($i = 1; $i <= 28; $i++) {
            if ($i === 3) {
            } else {
                Follow::factory()->create([
                    'followers_id' => 3,
                    'following_id' => $i,
                ]);
            }
        }
    }
}
