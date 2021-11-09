<?php

use App\Http\Controllers\ClassroomPostsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProfileController;
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

Route::view('/', 'index')->middleware('guest')->name('learnque');

Route::view('dashboard', 'pages.dashboard')->middleware('auth');

Route::view('courses', 'pages.courses')->middleware('auth');
Route::view('my-courses', 'pages.my-courses')->middleware('auth');
Route::view('my-paths', 'pages.my-paths')->middleware('auth');
Route::view('path-details', 'pages.path-details')->middleware('auth');
Route::view('course-preview', 'pages.course-preview')->middleware('auth');
Route::view('lesson-preview', 'pages.lesson-preview')->middleware('auth');
Route::view('take-lesson', 'pages.take-lesson')->middleware('auth');
Route::view('take-quiz', 'pages.take-quiz')->middleware('auth');
Route::view('quiz-results', 'pages.quiz-results')->middleware('auth');
Route::view('quiz-results-details', 'pages.quiz-results-details')->middleware('auth');
Route::view('path-assessment', 'pages.path-assessment')->middleware('auth');
Route::view('path-assessment-result', 'pages.path-assessment-result')->middleware('auth');
Route::view('paths', 'pages.paths')->middleware('auth');

Route::get('course/{course:uuid}', [CoursesController::class, 'show']);

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {
    /**
     * User profile routes
     */
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update']);

    Route::prefix('classrooms')->group(function () {
        Route::get('{classroom:unique_id}/posts/list', [ClassroomPostsController::class, 'getPaginatedList']);
    });
});
