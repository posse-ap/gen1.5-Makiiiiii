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

Route::get('quiz/{id?}', 'QuizyController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/quiz', 'HomeController@index')->name('quiz')->middleware('auth');

Route::resource('/edittitle', 'EdittitleController');
Route::post('/edittitle/list', 'EdittitleController@list')->name('edittitle_list');

// Route::resource('/editquestion', 'EditquestionController');

Route::get('/editquestion/{area_id}', 'EditquestionController@index')->name('editquestion_index');
Route::post('/editquestion/{area_id}', 'EditquestionController@store')->name('editquestion_store');
Route::post('/editquestion/{area_id}/list', 'EditquestionController@list')->name('editquestion_list');
Route::get('/editquestion/{area_id}/{id}/edit', 'EditquestionController@edit')->name('editquestion_edit');
Route::post('/editquestion/{area_id}/{id}/edit', 'EditquestionController@update')->name('editquestion_update');
Route::post('/editquestion/{area_id}/{id}/destroy', 'EditquestionController@destroy')->name('editquestion_destroy');

Route::get('/editchoice/{question_id}', 'EditchoiceController@index')->name('editchoice_index');
Route::post('/editchoice/{question_id}', 'EditchoiceController@store')->name('editchoice_store');
Route::post('/editchoice/{question_id}/{id}/destroy', 'EditchoiceController@destroy')->name('editchoice_destroy');
Route::get('/editchoice/{question_id}/{id}/edit', 'EditchoiceController@edit')->name('editchoice_edit');
Route::post('/editchoice/{question_id}/{id}/edit', 'EditchoiceController@update')->name('editchoice_update');



// Route::get('/edittitle', 'EdittitleController@list');