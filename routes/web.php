<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\lecturer\LecturerController as Lecturer;
use App\Http\Controllers\student\StudentController as Student;
use App\Http\Controllers\dev\DevController;
use App\Http\Controllers\dev\LecturerController as devLecturer;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/student', [Student::class, 'index']);

// DevController
Route::controller(DevController::class)->group(function(){
    Route::prefix('/dev')->group(function(){
        Route::get('', 'index');
        Route::post('', 'login');
        Route::get('logout', 'logout');
    });
});

Route::controller(Lecturer::class)->group(function(){
    Route::prefix('/lecturer')->group(function(){
        Route::get('', 'index');
        Route::post('', 'login');
        Route::get('logout', 'logout');
    });
});

// Lecturer for Developer
Route::controller(devLecturer::class)->group(function(){
    Route::prefix('/dev/lecturer')->group(function(){
        Route::get('', 'index');
        Route::post('add', 'create');
        Route::get('remove/{id}', 'removeConfirmation');
        Route::post('remove/{id}', 'removeNow');
        Route::get('reset-password/{id}', 'resetPasswordView');
        Route::post('reset-password/{id}', 'resetPassword');
        Route::get('view/{id}', 'viewLecturer');
    });
});
