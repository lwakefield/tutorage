<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Factories\CrudRepositoryFactory;

Route::get('/', 'HomeController@index');

Route::any('/logout', 'AuthController@anyLogout');
Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin');

Route::get('/p/{post}', 'PostController@show');
Route::get('/r/{subreddit_id}/new-post', [
    'uses' => 'PostController@create',
    'middleware' => 'auth'
]);
Route::post('/r/{subreddit_id}/new-post', [
    'uses' => 'PostController@newPost',
    'middleware' => 'auth'
]);

Route::get('/r/{sub}', 'SubredditController@show');
Route::get('/new-subreddit', [
    'uses' => 'SubredditController@create',
    'middleware' => 'auth'
]);
Route::post('/new-subreddit', [
    'uses' => 'SubredditController@newSubreddit',
    'middleware' => 'auth'
]);

Route::get('/register', [
    'uses' => 'UserController@getRegister',
    'middleware' => 'guest'
]);
Route::post('/register', [
    'uses' => 'UserController@postRegister',
    'middleware' => 'guest'
]);

Route::post('/p/{post}/reply', [
    'uses' => 'CommentController@commentOnPost',
    'middleware' => 'auth'
]);
Route::post('/c/{comment}/reply', [
    'uses' => 'CommentController@commentOnComment',
    'middleware' => 'auth'
]);

Route::post('/p/{post}/vote', [
    'uses' => 'VoteController@voteOnPost',
    'middleware' => 'auth'
]);
Route::post('/c/{comment}/vote', [
    'uses' => 'VoteController@voteOnComment',
    'middleware' => 'auth'
]);
