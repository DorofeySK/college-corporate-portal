<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//General routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{user}', [App\Http\Controllers\HomeController::class, 'checkUser'])->name('check_user');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Admin panel routes
Route::get('/add_user', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('add_user');
Route::controller(App\Http\Controllers\AdminPanel\JobController::class)->group(function () {
    Route::get('/add_job', 'index')->name('add_job');
    Route::post('/add_job', 'add_job')->name('add_job_post');
});
Route::controller(App\Http\Controllers\AdminPanel\DepartmentController::class)->group(function () {
    Route::get('/add_department', 'index')->name('add_department');
    Route::post('/add_department', 'add_department')->name('add_department_post');
});

//Standart user routes
Route::get('/add_statement', [App\Http\Controllers\StatementController::class, 'index'])->name('add_statement');
Route::get('/users', [])->name('users');
Route::controller(App\Http\Controllers\DocumentController::class)->group(function() {
    Route::get('/add_doc', 'index')->name('add_doc');
    Route::post('/add_doc', 'add_document')->name('add_doc_post');
});
Route::get('/messages', [])->name('messages');
