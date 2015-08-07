<?php
$faker = Faker\Factory::create();
$name = $faker->name;
$email = $faker->email;
$password = $faker->password;

$I = new FunctionalTester($scenario);
$I->wantTo('Log out');
$I->haveRecord('users', ['email' =>$email, 'name' => $name, 'password' => bcrypt($password)]);
$I->amLoggedAs(['email' =>$email, 'name' => $name, 'password' => $password]);
$I->amOnPage('');
$I->click('Log out');
$I->seeCurrentUrlEquals('');
$I->see('Log in');