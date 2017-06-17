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

Route::group(['middleware'=>'auth', 'prefix'=>'iamanevangelist' ], function () {
    Route::get('/', function(){
        return View('admin.index');
    });
    Route::resource('/user', 'AdminUsersController');
    Route::resource('/projects', 'AdminProjectsController');
});

/*

  /*
   * Auth
   *

*/

Auth::routes();

