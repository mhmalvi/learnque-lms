<?php

use App\Http\Controllers\Admin\CalendarEventsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClassroomMembersController;
use App\Http\Controllers\Admin\ClassroomPostsController;
use App\Http\Controllers\Admin\ClassroomsController;
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

/**
 * Classroom
 */
Route::view('classroom', 'admin.pages.classrooms.index')->name('classrooms');
Route::prefix('classrooms')->name('classroom.')->group(function () {
    Route::view('create', 'admin.pages.classrooms.create')->name('create');
    Route::post('/', [ClassroomsController::class, 'store']);
    Route::get('all', [ClassroomsController::class, 'getPaginatedList']);
    Route::post('members/add', [ClassroomMembersController::class, 'store']);

    Route::post('posts/publish', [ClassroomPostsController::class, 'store']);

    Route::get('{classroom:unique_id}', [ClassroomsController::class, 'show']);
    /**
     * For the vue routes situated in ClassroomsController@show
     */
    Route::get('{classroom:unique_id}/posts', [ClassroomsController::class, 'show']);
    Route::get('{classroom:unique_id}/students', [ClassroomsController::class, 'show']);
    Route::get('{classroom:unique_id}/teachers', [ClassroomsController::class, 'show']);

    Route::patch('{classroom:unique_id}/students/update', [ClassroomsController::class, 'updateStudents']);
    Route::patch('{classroom:unique_id}/teachers/update', [ClassroomsController::class, 'updateTeachers']);
});

// Category routes
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('list', [CategoryController::class, 'getPaginatedList'])->name('list');
    Route::get('all', [CategoryController::class, 'getRawList'])->name('all');
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::delete('{category:uuid}', [CategoryController::class, 'destroy']);
});

// Course routes
Route::prefix("courses")->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::post('/', [CourseController::class, 'store']);
    Route::get('all', [CourseController::class, 'getPaginatedList']);
    Route::get('raw', [CourseController::class, 'getRawList']);
    Route::get('create', [CourseController::class, 'create'])->name('create');
    Route::delete('{course:uuid}', [CourseController::class, 'destroy']);
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
    Route::get('raw', [StudentsController::class, 'getRawList']);
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
    Route::get('raw', [TeachersController::class, 'getRawList']);
    Route::get('edit/{teacher:name}', [TeachersController::class, 'edit']);
    Route::patch('{teacher:uuid}', [TeachersController::class, 'update']);
    Route::delete('{teacher:uuid}', [TeachersController::class, 'destroy']);
});

/**
 * Manage calendar events routes
 */
Route::prefix('calendar-events')->name('calendar_events.')->group(function () {
    Route::post('store', [CalendarEventsController::class, 'store']);
    Route::delete('destroy/{event}', [CalendarEventsController::class, 'destroy']);
});
