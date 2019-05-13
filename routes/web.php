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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/create_user','HomeController@create_form')->name('create_form_user')->middleware('auth');
Route::post('/new_user','HomeController@create')->name('create_user')->middleware('auth');
Route::get('/edit_user/{id}','HomeController@edit')->name('edit_user')->middleware('auth');
Route::post('/save_user/{id}','HomeController@save')->name('save_user')->middleware('auth');
Route::get('/delete_user/{id}','HomeController@delete')->name('delete_user')->middleware('auth');