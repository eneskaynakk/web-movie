<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FavoriteController;

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

Route::get('/', [MovieController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.delete');
});


Route::get('/login', function () {
    return view('pages/loginpage');
})->middleware(['guest'])->name('login');

Route::get('/register', function () {
    return view('pages/registerpage');
})->middleware(['guest'])->name('register');

Route::get('/watchlist', function () {
        return view('pages/watchlistpage');
    })->middleware(['auth'])->name('watch');

Route::get('/about', function () {
    return view('pages/aboutpage');
})->name('about');

Route::get('/team', function () {
    return view('pages/teampage');
})->name('team');

Route::get('/movie', function () {
    return view('pages/moviepage');
})->name('movie');
