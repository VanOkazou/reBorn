<?php

/*

  /*
   * Front
   *

*/

Route::get('/', 'FrontController@homeIndex')->name('homepage');

// Route for Evangelist
Route::get('/evangelist/{user}', 'FrontController@evangelistIndex')->name('evangelist');

// Route for Project
Route::get('/project/{id}', 'FrontController@projectIndex')->name('project');



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
    Route::post('/projects/users', 'AdminProjectsController@updateProjectUsers')->name('projects.users');
    Route::post('/attachment/delete/{id}', 'AdminProjectsController@destroyAttachment')->name('attachment.destroy');
    Route::post('/techno-user/add/{id}/{version}/{percent}', 'AdminUsersController@storeTechno')->name('techno.store');
    Route::post('/techno-user/delete/{idtechno}', 'AdminUsersController@destroyTechno')->name('techno.destroy');
});

/*

  /*
   * Auth
   *

*/

Auth::routes();

