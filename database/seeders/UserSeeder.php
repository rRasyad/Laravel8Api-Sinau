<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'role'      => 'admin',
            'avatar'    => 'https://sinau-bahasa.my.id/avatar/1.jpeg',
            'nama'      => 'fishyyy',
            'namaUser'  => 'Raivinskiy',
            'email'     => 'fishyyy@sinau-bahasa.my.id',
            'password'  => Hash::make('admin'),
        ]);

        User::factory()->create([
            'role'      => 'admin',
            'avatar'    => 'https://sinau-bahasa.my.id/avatar/2.png',
            'nama'      => 'ischez',
            'namaUser'  => 'rRasyad',
            'email'     => 'ischez@sinau-bahasa.my.id',
            'password'  => Hash::make('ischez'),
        ]);

        User::factory()->create([
            'namaUser'  => 'fikry',
            'email'     => 'fikry@sinau-bahasa.my.id',
            'password'  => Hash::make('fikry'),
        ]);

        User::factory(25)->create();
    }
}
