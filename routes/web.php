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
Auth::routes();
// // Disable Registration Routes...
// Route::get('register', 'Auth\RegisterController@redirectRegister')->name('register');
// Route::post('register', 'Auth\RegisterController@redirectRegister');

// // Disable Password Reset Routes...
// Route::get('password/reset', 'Auth\RegisterController@redirectRegister')->name('password.request');
// Route::post('password/email', 'Auth\RegisterController@redirectRegister')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\RegisterController@redirectRegister')->name('password.reset');
// Route::post('password/reset', 'Auth\RegisterController@redirectRegister');

// Admin
Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin'], function () {
    Route::get('/', 'AdministratorController@index')->name('admin.home');
});

Route::group(['prefix'=>'/','middleware'=>'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
});
