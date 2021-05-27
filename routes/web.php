<?php

use App\Http\Controllers\DifficultiesController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\SchoolsController;
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
Route::resource('schools', SchoolsController::class);
Route::resource('difficulties', DifficultiesController::class);
Route::resource('files', FilesController::class);
Route::resource('users', UsersController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
