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
        // UnitUser::factory()->create([
        //     'user_id' => 1,
        //     'bab_id' => 1,
        //     'reach' => 4,
        // ]);
        // UnitUser::factory()->create([
        //     'user_id' => 1,
        //     'bab_id' => 2,
        //     'reach' => 2,
        // ]);
        // for ($q = 3; $q <= 10; $q++) {
        //     UnitUser::factory()->create([
        //         'user_id' => 1,
        //         'bab_id' => $q,
        //     ]);
        // }

        for ($i = 1; $i <= 28; $i++) {
            UnitUser::factory()->create([
                'user_id' => $i,
                'bab_id' => 1,
                'reach' => 4,
            ]);
            if ($i <= 5) {
                for ($b = 2; $b <= 4; $b++) {
                    UnitUser::factory()->create([
                        'user_id' => $i,
                        'bab_id' => $b,
                        'reach' => 4,
                    ]);
                }
            }
            if ($i == 1) {
                UnitUser::factory()->create([
                    'user_id' => 1,
                    'bab_id' => 5,
                    'reach' => 2,
                ]);
            }
        }
    }
}
