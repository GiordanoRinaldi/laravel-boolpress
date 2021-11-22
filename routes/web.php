<?php

use App\Http\Controllers\Admin\HomeController;
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
//pubblica
Route::get('/', 'PageController@index')->name('index');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{slug}', 'PostController@show')->name("post.show");
Route::get('/posts/category/{slug}', 'CategoryController@show')->name("categories.show");
//pubbli vue api
Route::get('/api-posts', 'Pagecontroller@apiPosts')->name('posts.api');

Auth::routes();

//privata
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
});
