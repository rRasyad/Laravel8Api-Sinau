<?php

namespace Database\Seeders;

use App\Models\AchievUser;
use Illuminate\Database\Seeder;

class AchievUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            for ($a = 1; $a <= 5; $a++) {
                AchievUser::factory()->create([
                    'user_id' => $i,
                    'achiev_id' => $a,
                ]);
            }
        }
    }
}
