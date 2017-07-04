<?php

/*

  /*
   * Front
   *

*/

Route::get('/', 'HomeController@index');

// Route for Evangelist
Route::get('/evangelist/{user}', 'UserController@show')->name('evangelist');



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
    Route::post('/attachment/delete/{id}', 'AdminProjectsController@destroyAttachment')->name('attachment.destroy');
});

/*

  /*
   * Auth
   *

*/

Auth::routes();

