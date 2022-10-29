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

Route::get('/webapp', 'WebappController@index')->name('webapp_index')->middleware('auth');
Route::post('/studylog_post', 'WebappController@store')->name('webapp_store');

Route::get('/webapp/profile', 'WebappController@show')->name('webapp_profile')->middleware('auth');
//プロフィール編集
Route::post('/webapp/profile', 'WebappController@profileUpdate')->name('webapp_profile_edit');
Route::post('/webapp/delete', 'WebappController@destroy')->name('webapp_profile_destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
