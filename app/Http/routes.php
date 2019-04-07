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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/project/{id}', ['as'=>'home.project', 'uses'=>'AdminProjectsController@project']);


/*
* Route with middleware to allow only admins to see admin/users page
*/
Route::group(['middleware'=>'admin'], function (){

    Route::get('/admin', function (){
        return view('admin.index');
    });
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/projects', 'AdminProjectsController');
    Route::resource('admin/departments', 'AdminDepartmentsController');
    Route::resource('admin/drivers', 'AdminDriversController');
    Route::resource('admin/rags', 'AdminRAGsController');
    Route::resource('admin/comments', 'ProjectCommentsController');
    Route::resource('admin/comment/replies', 'ProjectRepliesController');
    Route::resource('admin/roles', 'AdminRoleController');
    Route::resource('admin/projectmanager', 'AdminProjectManagerController');

});




