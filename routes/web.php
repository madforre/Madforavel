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

/* Page */

Route::get('/', 'PagesController@index');
Route::get('about', 'PagesController@about');

/* CRUD구현을 위한 Resource 활용하기 (Restful API) */

Route::resource('posts', 'PostsController');

/* Default Setting ---------------------

Route::get('/', function () {
    return view('welcome'); });
------------------------------------- */ 
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/verify-user/{activation_code}', 'Auth\RegisterController@verification')->name('activate.code');
