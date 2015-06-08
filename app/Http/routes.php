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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('createdb',function(){
	Schema::create('users',function($table){
		$table->increments('id');
		$table->string('username',32);
		$table->string('password',60);
		$table->string('namauser',30);
		$table->timestamps();
	});
	return "tables has been created";
});


