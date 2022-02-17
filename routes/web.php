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

// developer login/logout process
Route::post('/dev', 'App\Http\Controllers\dev\DevController@login');
Route::get('/dev/logout', 'App\Http\Controllers\dev\DevController@logout');

// developer management
Route::get('/dev/lecturer', 'App\Http\Controllers\dev\LecturerController@index');
Route::post('/dev/lecturer/add', 'App\Http\Controllers\dev\LecturerController@create');
Route::get('/dev/lecturer/remove/{id}', 'App\Http\Controllers\dev\LecturerController@removeConfirmation');
Route::post('/dev/lecturer/remove/{id}', 'App\Http\Controllers\dev\LecturerController@removeNow');
Route::get('/dev/lecturer/reset-password/{id}', 'App\Http\Controllers\dev\LecturerController@resetPasswordView');
Route::post('/dev/lecturer/reset-password/{id}', 'App\Http\Controllers\dev\LecturerController@resetPassword');
Route::get('/dev/lecturer/view/{id}', 'App\Http\Controllers\dev\LecturerController@viewLecturer');
