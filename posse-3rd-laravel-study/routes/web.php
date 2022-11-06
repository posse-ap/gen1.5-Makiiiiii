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

// トップページ
Route::get('/webapp', 'WebappController@index')->name('webapp_index')->middleware('auth');
Route::post('/studylog_post', 'WebappController@store')->name('webapp_store');

//プロフィール編集
Route::get('/webapp/profile', 'WebappController@show')->name('webapp_profile')->middleware('auth');
Route::post('/webapp/profile', 'WebappController@profileUpdate')->name('webapp_profile_edit');
Route::post('/webapp/delete', 'WebappController@destroy')->name('webapp_profile_destroy');

// 管理者画面
Route::get('/admin', 'AdminController@index')->name('admin_index')->middleware(['auth', 'admin']);
Route::post('/admin/language/store', 'AdminController@language_store')->name('admin_language_store');
Route::get('/admin/language/{id}', 'AdminController@language_edit')->name('admin_language_edit')->middleware(['auth', 'admin']);
Route::post('/admin/language/edit', 'AdminController@language_update')->name('admin_language_update');
Route::post('/admin/language/destroy', 'AdminController@language_destroy')->name('admin_language_destroy');

Route::get('/admin/content', 'AdminController@content_index')->name('admin_content_index')->middleware(['auth', 'admin']);
Route::post('/admin/content/store', 'AdminController@content_store')->name('admin_content_store');
Route::get('/admin/content/{id}', 'AdminController@content_edit')->name('admin_content_edit')->middleware(['auth', 'admin']);
Route::post('/admin/content/edit', 'AdminController@content_update')->name('admin_content_update');
Route::post('/admin/content/destroy', 'AdminController@content_destroy')->name('admin_content_destroy');

Route::get('/admin/user', 'AdminController@user_index')->name('admin_user_index')->middleware(['auth', 'admin']);
Route::post('/admin/user', 'AdminController@user_store')->name('admin_user_store')->middleware(['auth', 'admin']);

// News画面
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{id}', 'NewsController@detail')->name('news_detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
