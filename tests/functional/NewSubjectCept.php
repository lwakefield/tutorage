<?php
$faker = Faker\Factory::create();
$name = $faker->name;
$email = $faker->email;
$password = $faker->password;

$subject_name = $faker->sentence($nbWords = 4);
$subject_code = $faker->regexify('[A-Z]{4}[0-9]{4}');

// Setup the database
$I = new FunctionalTester($scenario);
$I->wantTo('Create a new subject');
$user_id = $I->haveRecord('users', array('email' => $email, 'name' => $name, 'password' => bcrypt($password)));
$role = $I->grabRecord('roles', array('name' => 'tutor'));
$I->haveRecord('user_roles', array('user_id' => $user_id, 'role_id' => $role->id));

//Test away!
$I->amLoggedAs(['email' =>$email, 'name' => $name, 'password' => $password]);
$I->amOnPage('/');
$I->fillField('.new-subject-form input[name="code"]', $subject_code);
$I->fillField('.new-subject-form input[name="name"]', $subject_name);
$I->click('.new-subject-form button[type="submit"]');

$I->seeCurrentUrlEquals('/');
$I->seeRecord('subjects', array('code' => $subject_code, 'name' => $subject_name));
$I->see($subject_code.': '.$subject_name);
