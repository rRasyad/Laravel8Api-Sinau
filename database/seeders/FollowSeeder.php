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
            ($i >= 3) ? $limit = 5 : $limit = 28;
            for ($a = 1; $a <= $limit; $a++) {
                ($i == $a) ?: Follow::factory()->create([
                    'followers_id' => $i,
                    'following_id' => $a,
                ]);
            }
        }

        // for ($i = 1; $i <= 28; $i++) {
        //     ($i === 1) ?: Follow::factory()->create([
        //         'followers_id' => 1,
        //         'following_id' => $i,
        //     ]);
        // }
        // for ($i = 1; $i <= 28; $i++) {
        //     ($i === 2) ?: Follow::factory()->create([
        //         'followers_id' => 2,
        //         'following_id' => $i,
        //     ]);
        // }
        // for ($i = 1; $i <= 28; $i++) {
        //     ($i === 3) ?: Follow::factory()->create([
        //         'followers_id' => 3,
        //         'following_id' => $i,
        //     ]);
        // }
    }
}
