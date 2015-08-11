<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::truncate();
        Role::create(['name' => 'student']);
        Role::create(['name' => 'tutor']);
    }

}
