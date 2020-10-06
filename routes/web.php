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
Route::get('/', 'HomeController@index') -> name("home");

Route::get('/profile', 'UserController@profile') ->middleware('auth') ->name("profile");
Route::post('profile','UserController@update_avatar');

Route::get('/page/not/found', function (){
    abort(404, 'Page not found');
    abort(403);
}) -> name("404_PAGE");

Auth::routes();

