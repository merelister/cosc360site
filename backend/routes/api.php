<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('posts', 'PostController');
Route::resource('users', 'UserController');
Route::resource('threads', 'ThreadController');
Route::resource('messages', 'MessageController');
Route::resource('userPost', 'UserPostController');
Route::resource('threadPost', 'ThreadPostController');
Route::resource('userThread', 'UserThreadController');
Route::resource('userMessage', 'UserMessageController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
