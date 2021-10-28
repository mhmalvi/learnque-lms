<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnrollUsersController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\TeachersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Category routes
Route::prefix('course/categories')->name('course.categories.')->group(function () {
    Route::get('all', [CategoryController::class, 'getPaginatedList'])->name('all');
    Route::get('all/raw', [CategoryController::class, 'getRawList'])->name('all.raw');

    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
});

// Course routes
Route::prefix("courses")->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::post('/', [CourseController::class, 'store']);
    Route::get('all', [CourseController::class, 'getPaginatedList']);
    Route::get('create', [CourseController::class, 'create'])->name('create');
    Route::get('{course}', [CourseController::class, 'destroy']);
});

// Enrol User routes
Route::prefix("enroll-users")->name('enroll_users.')->group(function () {
    Route::get('/', [EnrollUsersController::class, 'index'])->name('index');
    Route::post('/', [EnrollUsersController::class, 'store'])->name('store');
});

/**
 * Manage Students routes
 */
Route::prefix("students")->name('students.')->group(function () {
    Route::get('/', [StudentsController::class, 'index'])->name('index');
    Route::get('all', [StudentsController::class, 'getPaginatedList']);
    Route::get('/edit/{student:name}', [StudentsController::class, 'edit']);
    Route::patch('{student:uuid}', [StudentsController::class, 'update']);
    Route::delete('{student:uuid}', [StudentsController::class, 'destroy']);
});

/**
 * Manage Teachers routes
 */
Route::prefix("teachers")->name('teachers.')->group(function () {
    Route::get('/', [TeachersController::class, 'index'])->name('index');
    Route::get('all', [TeachersController::class, 'getPaginatedList'])->name('all');
    Route::get('edit/{teacher:name}', [TeachersController::class, 'edit']);
    Route::patch('{teacher:uuid}', [TeachersController::class, 'update']);
    Route::delete('{teacher:uuid}', [TeachersController::class, 'destroy']);
});
