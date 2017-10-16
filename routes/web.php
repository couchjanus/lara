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
Route::resource('tags','Admin\TagsController');

Route::resource('roles','Admin\RolesController');

Route::resource('permissions', 'Admin\PermissionsController');

Auth::routes();

Route::get('/home', 'ProfileController@index')->name('home');

Route::get('/blog','PostController@index')->name('blog.index');
Route::get('/blog/show/{id}','PostController@show')->name('blog.show');

Route::get('/list','CategoryController@index')->name('list.index');
Route::get('/list/single/{id}','CategoryController@single')->name('list.single');

# Profile
// Route::resource('profile', 'ProfileController', ['only' => ['index', 'edit', 'update']]);
Route::get('/profile/edit/{username}', 'ProfileController@edit');
Route::get('/{username}', ['as' => 'profile', 'uses' => 'ProfileController@index']);


