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

Route::get('/', 'App\Http\Controllers\PostsController@index' );

Auth::routes();


Route::get('/p/create', 'App\Http\Controllers\PostsController@create');
Route::get('/p/{post}', 'App\Http\Controllers\PostsController@show');
Route::post('/p', 'App\Http\Controllers\PostsController@store');
Route::get('/p/delete/{post}', 'App\Http\Controllers\PostsController@delete');


Route::get('/r/{post}', 'App\Http\Controllers\RequestController@create');
Route::post('/r', 'App\Http\Controllers\RequestController@store');
Route::get('/requests/{user}', 'App\Http\Controllers\RequestController@index');
Route::get('/requests/delete/{request}', 'App\Http\Controllers\RequestController@delete');
Route::get('/requests/approve/{request}', 'App\Http\Controllers\RequestController@approve');

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');


