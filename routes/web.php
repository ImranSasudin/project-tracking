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

Route::prefix('staff')->name('staff.')->namespace('Staff')->group(function () {
  
    Route::get('dashboard', 'StaffController@dashboard')->name('dashboard');

});

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
  
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

});

Route::prefix('client')->name('client.')->namespace('Client')->group(function () {
  
    Route::get('dashboard', 'ClientController@dashboard')->name('dashboard');

});
