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
Route::get('/evangelist/{user}', 'UserController@show');



/*

  /*
   * Admin
   *

*/

Route::resource('/iamanevangelist', 'AdminUserController');


/*

  /*
   * Auth
   *

*/

Auth::routes();

