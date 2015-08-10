<?php
$faker = Faker\Factory::create();
$name = $faker->name;
$email = $faker->email;
$password = $faker->password;

$I = new FunctionalTester($scenario);
$I->wantTo('Log in');
$I->haveRecord('users', array('email' =>$email, 'name' => $name, 'password' => bcrypt($password)));
$I->amOnPage('/');
$I->fillField('.login-form input[name="email"]', $email);
$I->fillField('.login-form input[name="password"]', $password);
$I->click('.login-form button[type="submit"]');

$I->seeCurrentUrlEquals('');
$I->see('Welcome '.$name);
$I->seeAuthentication();
