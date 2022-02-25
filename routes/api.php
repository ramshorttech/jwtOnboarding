<?php

use App\Http\Controllers\api\Auth\LoginController;
use App\Http\Controllers\api\Auth\RegisterController;
use App\Http\Controllers\api\MeController;
use App\Http\Controllers\api\MoviesController;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => '/auth', ['middleware' => 'throttle:20,5']], function(){
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('/me', [MeController::class, 'index'])->name('me');
    Route::get('/auth/logout', [MeController::class, 'logout'])->name('logout');
});

Route::get('/movies', [MoviesController::class, 'index'])->name('movies');
Route::get('/movie/{id}', [MoviesController::class, 'getMovieById'])->name('getMovieById');
