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

 

Route::get('/', 'HomeController@index')->name('home');
Route::get('post/{slug}', 'PostController@details')->name('post.details');
Route::get('posts/', 'PostController@index')->name('post.index');

Auth::routes();

Route::group([ 'as'=>'admin.', 'prefix'=>'admin', 'namespace' => 'Admin', 'middleware' =>['auth', 'admin']], function (){

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::put('profile-update', 'SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingsController@updatePassword')->name('password.update');
    Route::resource('post', 'PostController');
    Route::put('/post/{id}/approve', 'PostController@approve')->name('post.approve');

});


 




