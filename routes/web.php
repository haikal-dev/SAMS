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

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/lecturer', 'App\Http\Controllers\lecturer\LecturerController@index');
Route::get('/student', 'App\Http\Controllers\student\StudentController@index');
Route::get('/dev', 'App\Http\Controllers\dev\DevController@index');

// admin login/logout process
Route::post('/dev', 'App\Http\Controllers\dev\DevController@login');
Route::get('/dev/logout', 'App\Http\Controllers\dev\DevController@logout');
