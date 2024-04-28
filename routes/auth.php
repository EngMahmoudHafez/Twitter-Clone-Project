<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register.view');
    Route::post('/register', [AuthController::class, 'store'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login.view');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
