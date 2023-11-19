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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{user}', [App\Http\Controllers\HomeController::class, 'checkUser'])->name('check_user');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/add_user', [])->name('add_user');
Route::get('/add_job', [])->name('add_job');
Route::get('/add_department', [])->name('add_department');

Route::get('/users', [])->name('users');
Route::get('/add_doc', [])->name('add_doc');
Route::get('/messages', [])->name('messages');
