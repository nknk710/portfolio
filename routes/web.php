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
    return view('home');
})->name('home');

Auth::routes();


// ログイン状態
Route::group(['middleware' => 'auth'], function() {

    // ユーザ関連
    Route::resource('users', 'UsersController',['except' => ['destroy']]);
    Route::get('questions/create','QuestionController@add');
    Route::get('users/register_done','UsersController@add');


});

// ゲスト状態
Route::get('contacts/create','ContactController@add')->name('contact');
Route::post('contacts/create','ContactController@create')->name('contact_done');

