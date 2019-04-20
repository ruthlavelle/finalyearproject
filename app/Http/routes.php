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

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/project/{id}', ['as'=>'home.project', 'uses'=>'AdminProjectsController@project']);
Route::patch('/project/{id}', ['as'=>'home.project', 'uses'=>'AdminProjectsController@status']);

/*
* Route with middleware to allow only admins to see admin/users page
*/


Route::group(['middleware'=>'admin'], function (){

    Route::get('/admin', ['as'=>'admin.index', 'uses'=>'AdminController@index']);
    Route::get('/dashboard', ['as'=>'admin.dashboard', 'uses'=>'AdminController@dashboard']);
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/projects', 'AdminProjectsController');
    Route::resource('admin/departments', 'AdminDepartmentsController');
    Route::resource('admin/drivers', 'AdminDriversController');
    Route::resource('admin/rags', 'AdminRAGsController');
    Route::resource('admin/comments', 'ProjectCommentsController');
    Route::resource('admin/comment/replies', 'CommentRepliesController');
    Route::resource('admin/roles', 'AdminRoleController');
    Route::resource('admin/projectmanager', 'AdminProjectManagerController');
    Route::resource('admin/status', 'AdminStatusController');
});

Route::resource('/home', 'HomeController');

Route::group(['middleware'=>'auth'], function (){

    Route::post('comment/reply', 'CommentRepliesController@createReply');
    Route::get('users/projects', ['as'=>'user.projects.index', 'uses'=>'UserProjectsController@index']);
    Route::get('users/projects/approvals', ['as'=>'user.project.approvals', 'uses'=>'UserProjectsController@approvals']);

});





