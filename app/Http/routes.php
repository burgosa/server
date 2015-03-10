<?php


Blade::setContentTags('<%', '%>');    // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data

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

Route::group(['prefix' => 'catalog'], function()
{

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('brands', 'BrandController');

});

Route::resource('cities', 'CityController');
Route::resource('users', 'UserController');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
