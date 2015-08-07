<?php
$faker = Faker\Factory::create();
$username = $faker->name;
$email = $faker->email;
$password = $faker->password;

$post_title = $faker->name;
$post_content = $faker->sentence;

$I = new FunctionalTester($scenario);
$I->wantTo('Create a new post');
$I->haveRecord('users', ['email' =>$email, 'name' => $username, 'password' => bcrypt($password)]);
$I->haveRecord('subreddits', ['name' => 'Lorem', 'description' => 'Ipsum dolor sit amet.', 'id' => 1]);
$I->amLoggedAs(['email' =>$email, 'name' => $username, 'password' => $password]);
$I->amOnPage('/r/1');
$I->click('New Post');
$I->fillField('title', $post_title);
$I->fillField('content', $post_content);
$I->click('Create', 'form');

$I->see($post_title);
$I->seeRecord('posts', array('title' => $post_title, 'content' => $post_content));
