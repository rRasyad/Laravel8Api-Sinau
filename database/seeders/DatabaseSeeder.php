<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(XpSeeder::class);
        $this->call(StreakSeeder::class);
        $this->call(FollowSeeder::class);
        $this->call(SoalSeeder::class);
        $this->call(JawabanSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(UnitBabSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
