<?php

use App\Http\Controllers\DifficultiesController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\LessonsDifficultiesController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('lessons', LessonsController::class);
Route::get('lessons/{id}/add-diff', [LessonsController::class, 'addDifficulties']);
Route::post('lessons/{id}/save-diff', [LessonsController::class, 'saveDifficulty']);

Route::resource('schools', SchoolsController::class);
Route::get('schools/{id}/add-teacher', [SchoolsController::class, 'addTeacher']);
Route::post('schools/{id}/save-teacher', [SchoolsController::class, 'saveTeacher']);

Route::resource('users', UsersController::class);
Route::post('users/assign-lesson', [UsersController::class, 'assignLesson']);

Route::resource('difficulties', DifficultiesController::class);
Route::resource('lessons-difficulties', LessonsDifficultiesController::class);
Route::resource('filess', FilesController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});