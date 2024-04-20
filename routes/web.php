<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(["prefix" => "ideas", "middleware" => ["auth"]], function () {
    Route::post('', [IdeaController::class, 'stroe'])->withoutMiddleware('auth');
    Route::get('/{idea}', [IdeaController::class, 'show'])->withoutMiddleware('auth');
    Route::delete('/{idea}', [IdeaController::class, 'destroy']);
    Route::put('/{idea}', [IdeaController::class, 'update']);
    Route::get('/{idea}/edit', [IdeaController::class, 'edit']);
    Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');
});


//the same work as the above
//Route::resource('ideas', IdeaController::class)->except(['index', 'create']);


Route::get('/', [IdeaController::class, 'index']);

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');
Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
