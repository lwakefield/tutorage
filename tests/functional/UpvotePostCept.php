<?php
$user = factory('App\User')->create();
$sub = factory('App\Subreddit')->create();
$post = factory('App\Post')->create();

$I = new FunctionalTester($scenario);
$I->wantTo('Upvote a post');
$I->amLoggedAs($user);
$I->amOnPage('/p/'.$post->id);
$I->see($post->title);
$I->click("form[action='/p/$post->id/vote'] button[value='1']");

$I->seeRecord('votes', array('direction' => '1', 'voteable_id' => $post->id, 'user_id' => $user->id));
