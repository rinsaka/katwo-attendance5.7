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

// Auth::routes();
// User 認証不要
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth:user'], function() {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::post('/home/confirm_delete', 'HomeController@confirm_delete');
  Route::get('/home/{year}/{month}', 'HomeController@show');
  Route::get('/home/{year}/{month}/create', 'HomeController@create');
  Route::get('/home/{year}/{month}/{aid}/edit', 'HomeController@edit');
  Route::post('/home/', 'HomeController@store')->name('store');
  Route::patch('/home/', 'HomeController@update')->name('update');
  Route::delete('/home/', 'HomeController@destroy')->name('destroy');
});

// Admin 認証不要
Route::group(['prefix' => 'admin'], function() {
  Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('login', 'Admin\LoginController@login');
});

// Admin ログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::get('home', 'Admin\HomeController@index')->name('admin.home');
  Route::get('activity/create', 'Admin\HomeController@create');
  Route::get('activity/{aid}', 'Admin\HomeController@edit')->name('admin.home');
  Route::patch('activity', 'Admin\HomeController@update')->name('admin_act_update');
  Route::post('activity', 'Admin\HomeController@store')->name('admin_act_store');
  Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
  Route::delete('activity/{id}', 'Admin\HomeController@destory');
});
