<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);

        $user->assignRole('Admin');

        $user1 = User::create([
            'name' => 'Pwmohon',
            'email' => 'pemohon@pemohon.com',
            'password' => bcrypt('123456'),
        ]);

        $user1->assignRole('Pemohon');

        $user2 = User::create([
            'name' => 'Walikota',
            'email' => 'walikota@walikato.com',
            'password' => bcrypt('123456'),
        ]);
        $user2->assignRole('Walikota');

        $user3 = User::create([
            'name' => 'Walikota',
            'email' => 'walikota@walikota.com',
            'password' => bcrypt('123456'),
        ]);
        $user3->assignRole('Walikota');

        $user3 = User::create([
            'name' => 'Setda',
            'email' => 'setda@setda.com',
            'password' => bcrypt('123456'),
        ]);
        $user3->assignRole('Setda');
    }
}
