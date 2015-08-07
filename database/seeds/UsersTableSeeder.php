<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Exceptions\ValidationException;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory('App\User')->times(10)->create();
    }
}
