<?php

use App\Http\Controllers\Student\ClassroomsController;
use Illuminate\Support\Facades\Route;

Route::prefix('classrooms')->name('classrooms.')->group(function () {
    Route::get('/', [ClassroomsController::class, 'index'])->name('index');
    Route::get('list', [ClassroomsController::class, 'getPaginatedList']);
    Route::get('{classroom:unique_id}', [ClassroomsController::class, 'show']);
});
