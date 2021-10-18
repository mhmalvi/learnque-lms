<?php

use App\Http\Controllers\Admin\CategoryController;
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

Route::prefix('course')->name('course.')->group(function () {
    Route::get('categories/all', [CategoryController::class, 'getPaginatedList'])->name('categories.all');

    Route::resource('categories', CategoryController::class);
});
