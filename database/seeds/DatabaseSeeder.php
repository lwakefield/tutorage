<?php

use App\User;
use App\Role;
use App\UserRoles;
use App\Subject;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::truncate();
        Role::truncate();
        UserRoles::truncate();
        Subject::truncate();

        Role::create(['name' => 'student']);
        Role::create(['name' => 'tutor']);
        factory('App\User')->times(100)->create();
        factory('App\Subject')->times(100)->create();
        foreach(User::all() as $user) {
            $role = Role::orderByRaw('RAND()')->first();
            $user->roles()->save($role);
        }
        $role = Role::where('name', '=', 'tutor')->first();
        $users = $role->users;
        foreach (range(0,1000) as $i) {
            $user = $users[rand(0, sizeof($users)-1)];
            $subject = Subject::orderByRaw('RAND()')->first();
            $user->subjects()->save($subject);
        }

        Model::reguard();
    }
}
