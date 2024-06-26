<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
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


Route::get('/', [IdeaController::class, 'index'])->name('dashboard');
Route::get('terms', function () {
    return view('terms');
});
Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('feed', [DashboardController::class, 'feed'])->middleware('auth')->name('feed');

Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');
Route::resource('users', UserController::class)->only('show');
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');

Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {

    Route::get('', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/ideas', [AdminIdeaController::class, 'index'])->name('ideas');
    Route::get('/comments', [AdminCommentController::class, 'index'])->name('comments');
    Route::delete('/comments/{comment}/delete', [AdminCommentController::class, 'destroy'])->name('comments.delete');
});

Route::get('lang/{lang}', function ($lang) {

    app()->setLocale($lang);
    session()->put('locale', $lang);
    //dd(app()->getLocale());
    return redirect()->back();
})->name('lang');
