<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('student_course/list', [App\Http\Controllers\StudentCourseController::class, 'getStudentCourses'])->name('student_course.list');
Route::resource('student_course', App\Http\Controllers\StudentCourseController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('courses/list', [App\Http\Controllers\HomeController::class, 'getCourses'])->name('courses.list');
