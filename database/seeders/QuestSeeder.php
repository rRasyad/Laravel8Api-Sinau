<?php

namespace Database\Seeders;

use App\Models\Quest;
use Illuminate\Database\Seeder;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quest::factory()->create([
            'quest_name' => 'Push up 100x',
            'requitment' => 100,
            'reward' => 100,
            'quest_category' => 'daily',
        ]);
        Quest::factory()->create([
            'quest_name' => 'Pull up 100x',
            'requitment' => 100,
            'reward' => 150,
            'quest_category' => 'daily',
        ]);
        Quest::factory()->create([
            'quest_name' => 'Sit up 100x',
            'requitment' => 100,
            'reward' => 200,
            'quest_category' => 'daily',
        ]);
        Quest::factory()->create([
            'quest_name' => 'Turu 100 jam',
            'requitment' => 100,
            'reward' => 300,
            'quest_category' => 'daily',
        ]);
        Quest::factory()->create([
            'quest_name' => 'Melek up 100x',
            'requitment' => 100,
            'reward' => 200,
            'quest_category' => 'daily',
        ]);
    }
}
