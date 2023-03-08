<?php

namespace Database\Seeders;

use App\Models\AchievementUser;
use Illuminate\Database\Seeder;

class AchievementUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 28; $i++) {
            ($i % 2 == 0) ? $limit = 5 : $limit = 2;
            for ($a = 1; $a <= $limit; $a++) {
                AchievementUser::factory()->create([
                    'user_id' => $i,
                    'achievement_id' => $a,
                ]);
            }
        }
        // for ($i = 1; $i <= 10; $i++) {
        //     for ($a = 1; $a <= 3; $a++) {
        //         AchievementUser::factory()->create([
        //             'user_id' => $i,
        //             'achievement_id' => $a,
        //         ]);
        //     }
        //     if ($i % 2 == 0) {
        //         AchievementUser::factory()->create([
        //             'user_id' => $i,
        //             'achievement_id' => 4,
        //         ]);
        //         AchievementUser::factory()->create([
        //             'user_id' => $i,
        //             'achievement_id' => 5,
        //         ]);
        //     }
        // }
    }
}
