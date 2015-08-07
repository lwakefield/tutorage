<?php
$faker = Faker\Factory::create();
$name = $faker->name;
$email = $faker->email;
$password = $faker->password;

$I = new FunctionalTester($scenario);
$I->wantTo('reigster');
$I->amOnPage('/register');
$I->dontSeeAuthentication();
$I->fillField('name', $name);
$I->fillField('email', $email);
$I->fillField('password', $password);
$I->click('Register', 'form');

$I->seeCurrentUrlEquals('');
$I->see('Welcome '.$name);
$I->seeRecord('users', array('email' => $email));