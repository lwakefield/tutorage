<?php
$faker = Faker\Factory::create();
$username = $faker->name;
$email = $faker->email;
$password = $faker->password;

$sub_name = $faker->name;
$sub_description = $faker->sentence;

$I = new FunctionalTester($scenario);
$I->wantTo('Create a new subreddit');
$I->haveRecord('users', ['email' =>$email, 'name' => $username, 'password' => bcrypt($password)]);
$I->amLoggedAs(['email' =>$email, 'name' => $username, 'password' => $password]);
$I->amOnPage('');
$I->click('New Subreddit');
$I->seeCurrentUrlEquals('/new-subreddit');
$I->fillField('name', $sub_name);
$I->fillField('description', $sub_description);
$I->click('Create', 'form');

$I->see($sub_name);
$I->seeRecord('subreddits', array('name' => $sub_name, 'description' => $sub_description));
