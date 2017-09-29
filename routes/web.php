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

Route::resource('articles','Admin\PostController');
Route::resource('users','Admin\UserController');
Route::resource('categories','Admin\CategoriesController');

Auth::routes();

Route::get('/home', 'ProfileController@index')->name('home');

# Profile
// Route::resource('profile', 'ProfileController', ['only' => ['index', 'edit', 'update']]);
Route::get('/profile/edit/{username}', 'ProfileController@edit');
Route::get('/{username}', ['as' => 'profile', 'uses' => 'ProfileController@index']);


