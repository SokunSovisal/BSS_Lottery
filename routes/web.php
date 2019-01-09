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
// Disable Registration Routes...
Route::get('register', 'Auth\RegisterController@redirectRegister')->name('register');
Route::post('register', 'Auth\RegisterController@redirectRegister');

// Disable Password Reset Routes...
Route::get('password/reset', 'Auth\RegisterController@redirectRegister')->name('password.request');
Route::post('password/email', 'Auth\RegisterController@redirectRegister')->name('password.email');
Route::get('password/reset/{token}', 'Auth\RegisterController@redirectRegister')->name('password.reset');
Route::post('password/reset', 'Auth\RegisterController@redirectRegister');

// Admin
Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware'=>'auth', 'namespace'=>'Admin'], function () {

	// Languages
    Route::get('locale/{locale}', function ($locale){
    	Session::put('locale',$locale);
    	return redirect()->back();
    })->name('locale');
    
    // Admin Home
    Route::get('/', 'AdministratorController@dashboard');
    Route::get('/dashboard', 'AdministratorController@dashboard')->name('dashboard');

    // Calculate Input
    Route::resource('/sales', 'SalesController');

    // Unser Management
    Route::resource('/users', 'UsersController');
    Route::get('users/{id}/password', 'usersController@password')->name('users.password');
    Route::put('users/{id}/password_update', 'usersController@password_update')->name('users.password_update');
    Route::put('users/{id}/status', 'usersController@status')->name('users.status');
    Route::get('users/{id}/image', 'usersController@image')->name('users.image');
    Route::put('users/{id}/image_update', 'usersController@image_update')->name('users.image_update');
    // User Roles
    Route::get('roles', 'UserRolesController@index')->name('roles.index');
    Route::get('roles/{id}/edit', 'UserRolesController@edit')->name('roles.edit');
    Route::put('roles/{id}/update', 'UserRolesController@update')->name('roles.update');


});

Route::group(['prefix'=>'/','middleware'=>'auth'], function () {

    // Languages
    Route::get('locale/{locale}', function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    })->name('locale');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
});
