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
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Jobs routes
Route::controller(App\Http\Controllers\AdminPanel\JobController::class)->group(function () {
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('/jobs/create', 'create')->name('jobs.create');
    Route::post('/jobs', 'store')->name('jobs.store');
    Route::get('/jobs/{id}', 'show')->name('jobs.show');
    Route::get('/jobs/{id}/edit', 'edit')->name('jobs.edit');
    Route::post('/jobs/{id}', 'update')->name('jobs.update');
});
//Departments routes
Route::controller(App\Http\Controllers\AdminPanel\DepartmentController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
    Route::get('/departments/create', 'create')->name('departments.create');
    Route::post('/departments', 'store')->name('departments.store');
    Route::get('/departments/{id}', 'show')->name('departments.show');
    Route::get('/departments/{id}/edit', 'edit')->name('departments.edit');
    Route::post('/departments/{id}', 'update')->name('departments.update');
});
//Statements routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::controller(App\Http\Controllers\StatementController::class)->group(function() {
    Route::get('/statements/{login}', 'index')->name('statements.index');
    Route::get('/statement/create', 'create')->name('statements.create');
    Route::post('/statement', 'store')->name('statements.store');
    Route::get('/statement/{id}/edit', 'edit')->name('statements.edit');
    Route::post('/statement/{id}', 'update')->name('statements.update');
});

//Userts route
Route::get('/users/create', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('users.create');
Route::controller(App\Http\Controllers\UserListController::class)->group(function() {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/{login}', 'show')->name('users.show');
    Route::get('/users/{login}/edit', 'edit')->name('users.edit');
    Route::post('/users/{login}', 'update')->name('users.update');
});

//Payment panel routes
Route::controller(App\Http\Controllers\StatementPanel\PaymentController::class)->group(function () {
    Route::get('/payments', 'index')->name('payments.index');
    Route::get('/payments/create', 'create')->name('payments.create');
    Route::post('/payments', 'store')->name('payments.store');
    Route::get('/payments/{id}', 'show')->name('payments.show');
    Route::get('/payments/{id}/edit', 'edit')->name('payments.edit');
    Route::post('/payments/{id}', 'update')->name('payments.update');
});

Route::controller(App\Http\Controllers\StatementPanel\DetailController::class)->group(function () {
    Route::get('/details', 'index')->name('details.index');
    Route::get('/details/create', 'create')->name('details.create');
    Route::post('/details', 'store')->name('details.store');
    Route::get('/details/{id}', 'show')->name('details.show');
    Route::get('/details/{id}/edit', 'edit')->name('details.edit');
    Route::post('/details/{id}', 'update')->name('details.update');
});

Route::controller(App\Http\Controllers\DocumentController::class)->group(function() {
    Route::get('/documents', 'index')->name('documents.index');
    Route::get('/documents/create', 'create')->name('documents.create');
    Route::post('/documents', 'store')->name('documents.store');
    Route::get('/documents/{id}', 'show')->name('documents.show');
});

Route::controller(App\Http\Controllers\MessageController::class)->group(function() {
    Route::get('/messages/{type}', 'index')->name('messages.index');
    Route::get('/messages/out/create', 'create')->name('messages.create');
    Route::post('/messages/out', 'store')->name('messages.store');
    Route::get('/messages/{type}/{id}', 'show')->name('messages.show');
});
