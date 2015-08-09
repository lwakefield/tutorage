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
Route::post('/login', 'AuthController@postLogin');

Route::post('/signup', [
    'uses' => 'UserController@postRegister',
    'middleware' => 'guest'
]);
