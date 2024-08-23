<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Public routes
Route::post('login', [UserController::class, 'loginPost']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');
Route::post('/register', [UserController::class, 'register'])->name('register.post');

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserController::class, 'logout']); // Accessible to authenticated users
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});
