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

Route::group(['middleware' => 'guest'], function () {
    Route::post('/', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'AccountController@register')->name('register');
    Route::get('/', 'Auth\AuthController@getLogin')->name('login');
    // Route::get('/dashboard', function () {
    //     return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'ProductController@index')->name('/dashboard');
    Route::post('logout', 'Auth\AuthController@logout')->name('logout');
});
