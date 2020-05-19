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

    
    Route::get('users/register_done','UsersController@add');
    Route::get('users/profile_edit','UsersController@edit')->name('edit');
    Route::post('users/profile_set','UsersController@update')->name('profile_set');
    Route::get('users/profile','UsersController@index')->name('profile');
    
    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');
    
    Route::get('questions/create','QuestionController@add')->name('question_create');
    Route::post('questions/post_done','QuestionController@create');
    Route::get('questions/question','QuestionController@show');
    
    


});

// ゲスト状態
Route::get('contacts/create','ContactController@add')->name('contact');
Route::post('contacts/create','ContactController@create')->name('contact_done');


