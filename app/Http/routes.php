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

Route::get('/signup', [
    'uses' => 'UserController@getSignup',
    'middleware' => 'guest'
]);
Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'middleware' => 'guest'
]);

Route::post('/new-subject', [
    'uses' => 'SubjectController@postNewSubject',
    'middleware' => 'tutor'
]);
Route::post('/add-subject', [
    'uses' => 'SubjectController@postAddSubject',
    'middleware' => 'tutor'
]);
Route::post('/find-tutors', [
    'uses' => 'SubjectController@postFindTutors',
    'middleware' => 'student'
]);
Route::post('/send-message', [
    'uses' => 'MessageController@postSendMessage',
    'middleware' => 'auth'
]);

Route::post('/vote-on-user/', [
    'uses' => 'VoteController@voteOnTutor',
    'middleware' => 'student'
]);

Route::get('/change-name', [
    'uses' => 'UserController@changeName',
    'middleware' => 'tutor'
    ]
);
Route::get('/change-price', [
    'uses' => 'UserController@changePrice',
    'middleware' => 'tutor'
    ]
);
Route::get('/change-description', [
    'uses' => 'UserController@changeDescription',
    'middleware' => 'tutor'
    ]
);
