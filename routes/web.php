<?php

/*

  /*
   * Front
   *

*/

Route::get('/', function () {
    return view('welcome');
});

// Route for Evangelist
Route::get('/user/{user}', 'UserController@show');


/*

  /*
   * Admin
   *

*/
Route::resource('/iamanevangelist', 'AdminUserController');
Auth::routes();
