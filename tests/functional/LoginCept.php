<?php
$faker = Faker\Factory::create();
$name = $faker->name;
$email = $faker->email;
$password = $faker->password;

$I = new FunctionalTester($scenario);
$I->wantTo('Log in');
$I->haveRecord('users', array('email' =>$email, 'name' => $name, 'password' => bcrypt($password)));
$I->amOnPage('/');
$I->click('Log in');
$I->seeCurrentUrlEquals('/login');
$I->fillField('email', $email);
$I->fillField('password', $password);
$I->click('Login', '.btn-primary');

$I->seeCurrentUrlEquals('');
$I->see('Welcome '.$name);
$I->seeAuthentication();
