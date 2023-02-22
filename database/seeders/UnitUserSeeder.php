<?php

namespace Database\Seeders;

use App\Models\UnitUser;
use Illuminate\Database\Seeder;

class UnitUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            for ($b = 1; $b <= 10; $b++) {
                UnitUser::factory()->create([
                    'user_id' => $i,
                    'bab_id' => $b,
                ]);
            }
        }
    }
}
