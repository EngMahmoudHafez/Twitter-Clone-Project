<?php

use App\Http\Controllers\IdeaController;
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

Route::get('/', [IdeaController::class, 'index']);
Route::post('/ideas', [IdeaController::class, 'stroe']);
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy']);
Route::get('/ideas/{idea}', [IdeaController::class, 'show']);
