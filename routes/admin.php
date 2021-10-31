<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

/**
 * Classroom
 */
Route::view('classroom', 'admin.pages.classrooms.index')->name('classrooms');
Route::view('classroom/create', 'admin.pages.classrooms.create')->name('classroom.create');


Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('list', [CategoryController::class, 'getPaginatedList'])->name('all');
    Route::get('all/raw', [CategoryController::class, 'getRawList'])->name('all.raw');
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
});


Route::prefix("courses")->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::post('/', [CourseController::class, 'store']);
    Route::get('all', [CourseController::class, 'getPaginatedList']);
    Route::get('create', [CourseController::class, 'create'])->name('create');
    Route::get('{course}', [CourseController::class, 'destroy']);
});
