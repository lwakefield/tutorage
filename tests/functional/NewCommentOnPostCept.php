<?php
$user = factory('App\User')->create();
$sub = factory('App\Subreddit')->create();
$post = factory('App\Post')->create();

$comment = factory('App\Comment')->make();

$I = new FunctionalTester($scenario);
$I->wantTo('Comment on a post');
$I->amLoggedAs($user);
$I->amOnPage('/p/'.$post->id);
$I->see($post->title);
$I->fillField("form[action='/p/$post->id/reply'] textarea[name='content']", $comment->content);
$I->click("form[action='/p/$post->id/reply'] input[type='submit']", 'form');

$I->seeRecord('comments', array('content' => $comment->content));
