<?php

use App\User;
use App\Role;
use App\UserRoles;
use App\Subject;
use App\Message;

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
        Message::truncate();

        $student_role = Role::create(['name' => 'student']);
        $tutor_role = Role::create(['name' => 'tutor']);
        factory('App\User')->times(100)->create();
        factory('App\Subject')->times(100)->create();
        foreach(User::all() as $user) {
            $role = Role::orderByRaw('RAND()')->first();
            $user->roles()->save($role);
        }

        $student = User::create(['email' => 'student@test.com', 'name' => 'student', 'password' => 'password123']);
        $student->roles()->save($student_role);
        $tutor = User::create(['email' => 'tutor@test.com', 'name' => 'tutor', 'password' => 'password123']);
        $tutor->roles()->save($tutor_role);

        $users = $tutor_role->users;
        foreach (range(0,1000) as $i) {
            $user = $users[rand(0, sizeof($users)-1)];
            $subject = Subject::orderByRaw('RAND()')->first();
            $user->subjects()->save($subject);
        }
        factory('App\Message')->times(10000)->create();

        Model::reguard();
    }
}
