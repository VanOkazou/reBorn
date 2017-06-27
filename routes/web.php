<?php

/*

  /*
   * Front
   *

*/

Route::get('/', 'Controller@index');

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
    Route::post('/projects/upload', 'AdminProjectsController@uploadImage')->name('projects.upload');
    Route::post('/projects/delete/{id}', 'AdminProjectsController@delete')->name('projects.delete');
});

/*

  /*
   * Auth
   *

*/

Auth::routes();

