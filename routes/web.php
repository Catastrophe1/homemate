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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', 'UserController@profile');
Route::post('profile/avatar', 'UserController@update_avatar');
Route::post('profile', 'UserController@update_profile');
Route::post('profile/info', 'UserController@update_info');

Route::get('settings', 'SettingsController@settings');
Route::post('settings', 'SettingsController@update_info');