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
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
        ]);

        $user1->assignRole('User');
    }
}
