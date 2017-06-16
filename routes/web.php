<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route for connexion
Route::get('/iamanevangelist', 'Auth\LoginController@showLoginForm');

// Route for Evangelist
Route::get('/{user}', 'UserController@show');


Route::resource('admin', 'LoginController@login ');
Auth::routes();
