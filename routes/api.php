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

// Authentication Routes
Route::post('login', [App\Http\Controllers\Api\UserController::class, 'login'])->name('login');
Route::post('register', [App\Http\Controllers\Api\UserController::class, 'register'])->name('register');
Route::post('login', [App\Http\Controllers\Api\UserController::class, 'login'])->name('login');
Route::get('courses/list', [App\Http\Controllers\HomeController::class, 'getAllCourses'])->name('courses.list');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', [App\Http\Controllers\Api\UserController::class, 'details'])->name('details');
    Route::get('student/courses', [App\Http\Controllers\Api\UserController::class, 'favouriteCourses'])->name('courses.student');
    Route::post('student/add/course', [App\Http\Controllers\StudentCourseController::class, 'store'])->name('course.select');
});