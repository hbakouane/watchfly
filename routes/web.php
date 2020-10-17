<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\TvShowsController;

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

Route::get('/', [MoviesController::class, 'index']);
Route::get('/movie/{movie_id}', [MoviesController::class, 'show']);
Route::resource('/actor', ActorsController::class)->only(['index', 'show']);
Route::get('/tv', [TvShowsController::class, 'index']);
Route::get('/tv/{id}', [TvShowsController::class, 'show']);

Route::fallback(function () {
    return view("errors.404");
});
