<?php

namespace Database\Seeders;

use App\Models\QuestUser;
use Illuminate\Database\Seeder;

class QuestUserSeeder extends Seeder
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
                QuestUser::factory()->create([
                    'user_id' => $i,
                    'quest_id' => $a,
                ]);
            }
        }
    }
}
