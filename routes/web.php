<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {

    // Categories
    Route::resource('categories', 'CategoryController');

    // Posts
    Route::resource('posts', 'PostController');
    Route::prefix('posts/trashed')->group(function () {
        Route::get('list', 'PostController@trashed')->name('posts.trashed');
        Route::get('restore/{post}', 'PostController@restore')->name('posts.restore');
    });
});
