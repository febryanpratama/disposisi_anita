<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerifikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $verifikator = User::create([
            'name' => 'Verifikator',
            'email' => 'verifikator@verifikator.com',
            'password' => bcrypt('123456'),
        ]);

        $verifikator->assignRole('Verifikator');
    }
}
