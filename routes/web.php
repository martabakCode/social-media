<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('follow/{user}', 'App\Http\Controllers\FollowsController@store');

Route::post('/like/{post}','App\Http\Controllers\LikeController@store');
Route::post('/bookmark/{post}','App\Http\Controllers\BookmarkController@store');

Route::get('/','App\Http\Controllers\PostController@index');

Route::get('/cctv','App\Http\Controllers\PostController@cctv');
Route::get('/p/create', 'App\Http\Controllers\PostController@create');
Route::post('/p', 'App\Http\Controllers\PostController@store');
Route::get('/p/{post}', 'App\Http\Controllers\PostController@show');
Route::post('/p/{post}', 'App\Http\Controllers\CommentController@store');
Route::get('/manage', 'App\Http\Controllers\PostController@manage');
Route::get('/manage/delete/{post}', 'App\Http\Controllers\PostController@delete');
Route::get('/account', 'App\Http\Controllers\UserController@show');
Route::patch('/account/edit', 'App\Http\Controllers\UserController@edit');
Route::get('/p/show/{post}', 'App\Http\Controllers\PostController@edit')->name('posts.edit');
Route::patch('/p/edit/{post}', 'App\Http\Controllers\PostController@update');
Route::get('/c/delete/{comment}', 'App\Http\Controllers\CommentController@delete');

Route::get('/profile/{user}', 'App\Http\Controllers\ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'App\Http\Controllers\ProfileController@update')->name('profile.update');

require __DIR__.'/auth.php';
