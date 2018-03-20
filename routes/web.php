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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//menu
Route::get('/menu', 'MenuController@index')->name('menu');
Route::post('/menu', 'MenuController@GetMenu')->name('GetMenu');
Route::post('/menu/new', 'MenuController@InsertMenu')->name('InsertMenu');
Route::post('/menu/edit', 'MenuController@GetMenuDetail')->name('GetMenuDetail');
Route::post('/menu/delete', 'MenuController@DeleteData')->name('DeleteData');

//pages
Route::get('/pages', 'PagesController@index')->name('pages');
Route::get('/pages/{pages_id}', 'PagesController@GetDataDetail')->name('GetDataDetail');
Route::post('/pages', 'PagesController@GetData')->name('GetData');
Route::get('/pages/new', 'PagesController@GetDataDetail')->name('newPage');
Route::post('/pages/new', 'PagesController@InsertData')->name('InsertData');
Route::post('/pages/delete', 'PagesController@DeleteData')->name('DeleteData');

//posts
Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/posts/{posts_id}', 'PostsController@GetDataDetail')->name('GetDataDetail');
Route::post('/posts', 'PostsController@GetData')->name('GetData');
Route::get('/posts/new', 'PostsController@GetDataDetail')->name('newPage');
Route::post('/posts/new', 'PostsController@InsertData')->name('InsertData');
Route::post('/posts/delete', 'PostsController@DeleteData')->name('DeleteData');

//logo
Route::get('/logo', 'LogoController@index')->name('logo');
Route::post('/logo/new', 'LogoController@InsertData')->name('logo_new');

//user
Route::get('/users', 'UsersController@index')->name('users');
Route::post('/users', 'UsersController@GetData')->name('GetUserData');
Route::get('/users/{user_id}', 'UsersController@GetDataDetail')->name('GetUserDataDetail');
Route::post('/users/new', 'UsersController@InsertData')->name('InsertUserData');
Route::post('/users/delete', 'UsersController@DeleteData')->name('DeleteUserData');