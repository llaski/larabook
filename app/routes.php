<?php

Event::listen('Larabook.Registration.Events.UserRegistered', function($user){
	// dd('send notif');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::get('/register', array('as' => 'register_path', 'uses' => 'RegistrationController@create'));
Route::post('/register', array('as' => 'register', 'uses' => 'RegistrationController@store'));

Route::get('login', array('as' => 'login_path', 'uses' => 'SessionsController@create'));
Route::post('login', array('as' => 'login', 'uses' => 'SessionsController@store'));

Route::get('logout', array('as' => 'logout_path', 'uses' => 'SessionsController@destroy'));


Route::get('statuses', array('as' => 'statuses_path', 'uses' => 'StatusController@index'));
Route::post('statuses', array('as' => 'status', 'uses' => 'StatusController@store'));
