<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PagesController;

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
Route::middleware(['auth'])->group(function () {
    Route::controller(MovieController::class)->group(function () {
        Route::get('/movie', 'index');
        Route::get('/movie-create', 'create');
        Route::post('/movie-create', 'store')->name('movie.perform');
        Route::get('/movie-edit/{id}', 'edit')->name('movie.edit');
        Route::put('/movie-edit/{id}', 'update')->name('movie.update');
        Route::delete('movie/{id}', 'destroy')->name('movie.delete');
    });
    Route::controller(GenreController::class)->group(function () {
        Route::get('/genre', 'index');
        Route::post('/genre', 'store')->name('genre.perform');
        Route::get('/genre-edit/{id}', 'edit')->name('genre.edit');
        Route::put('/genre-edit/{id}', 'update')->name('genre.update');
        Route::delete('genre/{id}', 'destroy')->name('genre.delete');
    });
});
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'single')->name('single');
});
