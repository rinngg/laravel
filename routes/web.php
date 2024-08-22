<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

// Show the login form
Route::get('/login-page', [UserController::class, 'login'])->name('login');

// Handle login submission
Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');

// Handle logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Optional: Handle user registration
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.post');

// Define a route for the homepage
Route::get('/home',[HomeController::class,'index'])->name('home');

// Define additional routes for 'about', 'services', 'contact' pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/events', function () {
    return view('events');
})->name('events');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/userscreate', function () {
    return view('userscreate');
})->name('userscreate')->middleware('admin');

// Define a route for handling contact form submissions
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// Update the specified user
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Delete the specified user
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// create user

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');