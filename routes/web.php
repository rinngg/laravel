<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

// Login Routes
Route::view('/', 'login'); // Default route to login page
Route::get('/login-page', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.post');

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Static Pages Routes
Route::get('/about', function () {
    return view('about');
})->name('about')->middleware('auth');

Route::get('/events', function () {
    return view('events');
})->name('events')->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
})->name('contact')->middleware('auth');

// Contact Form Submission
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');

// User Management Routes
Route::middleware('auth')->group(function () {
    // Show the form for creating a new user
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

    // Store a newly created user in storage
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Show the form for editing a user
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

    // Update the specified user
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    // Delete the specified user
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
