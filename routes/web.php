<?php

/*

  /*
   * Front
   *

*/

Route::get('/', 'HomeController@index')->name('homepage');

// Route for Evangelist
Route::get('/evangelist/{user}', 'UserController@show')->name('evangelist');

// Route for Project
Route::get('/project/{id}', 'ProjectController@show')->name('project');



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
    Route::resource('/technos', 'AdminTechnosController');
    Route::post('/projects/upload', 'AdminProjectsController@uploadImage')->name('projects.upload');
    Route::post('/attachment/delete/{id}', 'AdminProjectsController@destroyAttachment')->name('attachment.destroy');
});

/*

  /*
   * Auth
   *

*/

Auth::routes();

