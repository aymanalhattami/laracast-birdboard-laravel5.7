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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'ProjectsController@index');
    Route::get('/home', 'HomeController@index')->name('home');

    // Route::get('/projects', 'ProjectsController@index');
    // Route::get('/projects/create', 'ProjectsController@create');
    // Route::post('/projects', 'ProjectsController@store');
    // Route::get('/projects/{project}/edit', 'ProjectsController@edit');
    // Route::patch('/projects/{project}', 'ProjectsController@update');
    // Route::get('projects/{project}', 'ProjectsController@show');

    Route::resource('projects', 'ProjectsController');

    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('projects/{project}/tasks/{task}', 'ProjectTasksController@update');
    Route::post('projects/{project}/invitations', 'ProjectInvitationsController@store');
});
