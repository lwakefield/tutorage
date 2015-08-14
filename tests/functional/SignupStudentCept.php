<?php
$faker = Faker\Factory::create();
$name = $faker->name;
$email = $faker->email;
$password = $faker->password;

$I = new FunctionalTester($scenario);
$I->wantTo('Signup as a student');
$I->amOnPage('/');
$I->dontSeeAuthentication();

$I->click('Signup');
$I->seeCurrentUrlEquals('/signup');

$I->selectOption('select[name="user_type"]', 'student');
$I->fillField('input[name="name"]', $name);
$I->fillField('input[name="email"]', $email);
$I->fillField('input[name="password"]', $password);
$I->fillField('input[name="verify_password"]', $password);

$I->click('button[type="submit"]');
$I->seeCurrentUrlEquals('');

$I->see('Welcome '.$name);
$I->seeRecord('users', array('email' => $email));
$user = $I->grabRecord('users', array('email' => $email));
$role = $I->grabRecord('roles', array('name' => 'student'));
$I->seeRecord('user_roles', array('user_id' => $user->id, 'role_id' => $role->id));

