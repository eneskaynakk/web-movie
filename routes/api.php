<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use Laravel\Fortify\Http\Controllers\{AuthenticatedSessionController, RegisteredUserController};
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
})->name('api.user');

Route::post('register', [RegisteredUserController::class, 'store'])->name('api.register');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('api.login');
Route::middleware(['auth:sanctum'])->post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('api.logout');

Route::get('/search/{query}', [MovieController::class, 'search'])->name('api.search');
