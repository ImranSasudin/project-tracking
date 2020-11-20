<?php

use Illuminate\Support\Facades\Route;
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
    return view('login');
});

Route::get('home', 'LoginController@home')->name('home');
Route::get('login', 'LoginController@login')->name('login');
Route::post('login', 'LoginController@loginPost')->name('login.post');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::get('account/view', 'UserController@view')->name('account.view');
Route::get('account/edit', 'UserController@edit')->name('account.edit');
Route::post('account/update', 'UserController@update')->name('account.update');
Route::post('account/update/password', 'UserController@updatePassword')->name('account.update.password');

Route::prefix('staff')->name('staff.')->namespace('Staff')->group(function () {
  
    Route::get('dashboard', 'StaffController@dashboard')->name('dashboard');

    Route::get('project', 'ProjectController@index')->name('project');
 
    Route::get('task', 'TaskController@index')->name('task');
    Route::get('task/edit/{id}', 'TaskController@edit')->name('task.edit');
    Route::post('task/update', 'TaskController@update')->name('task.update');

});

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
  
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

    Route::get('staff', 'StaffController@index')->name('staff');
    Route::get('staff/create', 'StaffController@create')->name('staff.create');
    Route::post('staff/create', 'StaffController@store')->name('staff.store');
    Route::get('staff/delete/{id}', 'StaffController@delete')->name('staff.delete');
    Route::get('staff/edit/{id}', 'StaffController@edit')->name('staff.edit');
    Route::post('staff/update', 'StaffController@update')->name('staff.update');
    
    Route::get('client', 'ClientController@index')->name('client');
    Route::get('client/create', 'ClientController@create')->name('client.create');
    Route::post('client/create', 'ClientController@store')->name('client.store');
    Route::get('client/delete/{id}', 'ClientController@delete')->name('client.delete');
    Route::get('client/edit/{id}', 'ClientController@edit')->name('client.edit');
    Route::post('client/update', 'ClientController@update')->name('client.update');

    Route::get('project', 'ProjectController@index')->name('project');
    Route::get('project/create', 'ProjectController@create')->name('project.create');
    Route::post('project/create', 'ProjectController@store')->name('project.store');
    Route::get('project/delete/{id}', 'ProjectController@delete')->name('project.delete');
    Route::get('project/edit/{id}', 'ProjectController@edit')->name('project.edit');
    Route::post('project/update', 'ProjectController@update')->name('project.update');
    Route::post('project/update/progress', 'ProjectController@updateProgress')->name('project.update.progress');

    Route::get('task', 'TaskController@index')->name('task');
    Route::get('task/create', 'TaskController@create')->name('task.create');
    Route::post('task/create', 'TaskController@store')->name('task.store');
    Route::get('task/delete/{id}', 'TaskController@delete')->name('task.delete');
    Route::get('task/edit/{id}', 'TaskController@edit')->name('task.edit');
    Route::post('task/update', 'TaskController@update')->name('task.update');
});

Route::prefix('client')->name('client.')->namespace('Client')->group(function () {
  
    Route::get('dashboard', 'ClientController@dashboard')->name('dashboard');

    Route::get('project', 'ProjectController@index')->name('project');
    Route::get('project/create', 'ProjectController@create')->name('project.create');
    Route::post('project/create', 'ProjectController@store')->name('project.store');
    Route::get('project/edit/{id}', 'ProjectController@edit')->name('project.edit');
    Route::post('project/update', 'ProjectController@update')->name('project.update');

    Route::get('progress/view/{id}', 'ProjectController@view')->name('progress.view');

});
