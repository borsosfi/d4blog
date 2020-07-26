<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('blog/{blogUrl}', 'HomeController@readPost')->name('blog.read');
Route::get('tag/{tagUrl}', 'HomeController@filterByTag')->name('blog.tag');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\PostController@index');
    /*
        Method        Path                       Action             Route name

        GET           /post                      index              post.index
        GET           /post/create               create             post.create
        POST          /post                      store              post.store
        GET           /post/{post}               show               post.show
        GET           /post/{post}/edit          edit               post.edit
        PUT|PATCH     /post/{post}               update             post.update
        DELETE        /post/{post}               destroy            post.destroy
    */
    Route::resource('post', 'Admin\PostController');
    /*
        Method        Path                       Action             Route name

        GET           /tag                       index              tag.index
        GET           /tag/create                create             tag.create
        POST          /tag                       store              tag.store
        GET           /tag/{tag}                 show               tag.show
        GET           /tag/{tag}/edit            edit               tag.edit
        PUT|PATCH     /tag/{tag}                 update             tag.update
        DELETE        /tag/{tag}                 destroy            tag.destroy
    */
    Route::resource('tag', 'Admin\TagController');
});

// Route::get('/home', 'HomeController@index')->name('home');
