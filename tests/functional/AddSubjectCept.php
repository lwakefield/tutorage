<?php
$faker = Faker\Factory::create();
$name = $faker->name;
$email = $faker->email;
$password = $faker->password;

$subject_name = $faker->sentence($nbWords = 4);
$subject_code = $faker->regexify('[A-Z]{4}[0-9]{4}');

// Setup the database
$I = new FunctionalTester($scenario);
$I->wantTo('Add a new subject');
$user_id = $I->haveRecord('users', array('email' => $email, 'name' => $name, 'password' => bcrypt($password)));
$role = $I->grabRecord('roles', array('name' => 'tutor'));
$I->haveRecord('user_roles', array('user_id' => $user_id, 'role_id' => $role->id));
$subject_id = $I->haveRecord('subjects', array('code' => $subject_code, 'name' => $subject_name));

//Test away!
$I->amLoggedAs(['email' =>$email, 'name' => $name, 'password' => $password]);
$I->amOnPage('/');
$I->selectOption('.add-subject-form select[name="subject_id"]', $subject_id);
$I->click('.add-subject-form button[type="submit"]');

$I->seeCurrentUrlEquals('/');
$I->seeRecord('tutor_subjects', array('subject_id' => $subject_id, 'user_id' => $user_id));
