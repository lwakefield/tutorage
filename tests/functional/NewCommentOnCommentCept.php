<?php
$user = factory('App\User')->create();
$sub = factory('App\Subreddit')->create();
$post = factory('App\Post')->create();
$parent_comment = factory('App\Comment')->create();
$post->comments()->save($parent_comment);

$child_comment = factory('App\Comment')->make();

$I = new FunctionalTester($scenario);
$I->wantTo('Comment on a comment');
$I->amLoggedAs($user);
$I->amOnPage('/p/'.$post->id);
$I->see($post->title);
$I->fillField("form[action='/c/$parent_comment->id/reply'] textarea[name='content']", $child_comment->content);
$I->click("form[action='/c/$parent_comment->id/reply'] input[type='submit']", 'form');

$I->seeRecord('comments', array('content' => $child_comment->content));
