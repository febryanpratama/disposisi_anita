<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create(['name' => 'Admin']);

        Role::create(['name' => 'Pemohon']);

        Role::create(['name' => 'Walikota']);

        Role::create(['name' => 'Verifikator']);

        Role::create(['name' => 'Setda']);
    }
}
