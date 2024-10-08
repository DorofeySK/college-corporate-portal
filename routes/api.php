<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_users', function (Request $rq) {
    return array_column(App\Models\User::get()->toArray(), 'login');
})->name('api.get.users');


Route::get('/merge/get_merged', [App\Http\Controllers\MergeController::class, 'get_merged'])->name('merge.get_merged');
Route::get('/merge/download', [App\Http\Controllers\MergeController::class, 'download'])->name('merge.download');