<?php
$faker = Faker\Factory::create();
$name = $faker->name;
$email = $faker->email;
$password = $faker->password;

$I = new FunctionalTester($scenario);
$I->wantTo('Signup as a tutor');
$I->amOnPage('/');
$I->dontSeeAuthentication();
$I->fillField('.tutor-signup-form input[name="name"]', $name);
$I->fillField('.tutor-signup-form input[name="email"]', $email);
$I->fillField('.tutor-signup-form input[name="password"]', $password);
$I->fillField('.tutor-signup-form input[name="verify_password"]', $password);
$I->click('.tutor-signup-form button[type="submit"]');

$I->seeCurrentUrlEquals('');
$I->see('Welcome '.$name);
$I->seeRecord('users', array('email' => $email));
$user = $I->grabRecord('users', array('email' => $email));
$role = $I->grabRecord('roles', array('name' => 'tutor'));
$I->seeRecord('user_roles', array('user_id' => $user->id, 'role_id' => $role->id));

