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

Route::group(['middleware' => 'owner'], function()
{
    Route::get('/owner', function()
    {
        // can only access this if type == O
    });

    Route::get('/owner/dashboard', 'Owner\DashboardController@index');

});

Route::group(['middleware' => 'admin'], function()
{
    Route::get('/admin', function()
    {
        // can only access this if type == A
    });

    Route::get('/admin/dashboard', 'Admin\DashboardController@index');

});


Route::get('createdb',function(){
	Schema::create('users',function($table){
		$table->increments('id');
		$table->string('username',32);
		$table->string('password',60);
		$table->string('namauser',30);
		$table->string('role', 30);
		$table->string('remember_token',60);
		$table->timestamps();
	});
	return "tables has been created";
});

//Route::get('/admin/dashboard', 'Admin\DashboardController@index');


