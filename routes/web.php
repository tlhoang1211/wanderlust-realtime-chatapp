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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\AppController@index')->middleware('auth');

Route::get('/messages', 'App\Http\Controllers\MessageController@index')->middleware('auth');

Route::post('/messages', 'App\Http\Controllers\MessageController@store')->middleware('auth');

Route::post('/reactions', 'App\Http\Controllers\ReactionController@react')->middleware('auth');

Route::get('/{any}', 'App\Http\Controllers\AppController@index')->where('any', '.*')->middleware('auth'); // catch all routes or else it will return 404 with Vue router in history mode
