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
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/1.jpeg',
            'nama'      => 'fishyyy',
            'namaUser'  => 'Raivinskiy',
            'email'     => 'fishyyy@sinau-bahasa.my.id',
            'password'  => Hash::make('admin'),
        ]);

        User::factory()->create([
            'role'      => 'admin',
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/2.png',
            'nama'      => 'ischez',
            'namaUser'  => 'rRasyad',
            'email'     => 'ischez@sinau-bahasa.my.id',
            'password'  => Hash::make('ischez'),
        ]);

        User::factory()->create([
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/3.png',
            'nama'      => 'Fikry',
            'namaUser'  => 'StickyPiston',
            'email'     => 'fikry@sinau-bahasa.my.id',
            'password'  => Hash::make('fikry'),
        ]);

        User::factory()->create([
            'role'      => 'system',
            'nama'      => 'Tetra',
            'namaUser'  => 'Tetra',
            'email'     => 'tetra@sinau-bahasa.my.id',
            'password'  => Hash::make('ischez'),
        ]);

        User::factory()->create([
            'nama'      => 'Reza',
            'namaUser'  => 'NamkuReza',
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/5.png',
        ]);
        User::factory()->create([
            'nama'      => 'Robert',
            'namaUser'  => 'RobertLyøn',
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/6.png',
        ]);
        User::factory()->create([
            'nama'      => 'Rizqie',
            'namaUser'  => 'Pussay',
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/7.png',
        ]);
        User::factory()->create([
            'nama'      => 'Aryo',
            'namaUser'  => 'Mosa',
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/8.png',
        ]);
        User::factory()->create([
            'nama'      => 'Roe',
            'namaUser'  => 'Kizu',
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/9.png',
        ]);
        User::factory()->create([
            'nama'      => 'Gavin',
            'namaUser'  => 'GavinNamku',
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/10.png',
        ]);
        User::factory()->create([
            'nama'      => 'Viri',
            'namaUser'  => 'ÆÜGH',
            'avatar'    => 'https://img.sinau-bahasa.my.id/avatar/11.gif',
        ]);
        User::factory(17)->create();
    }
}
