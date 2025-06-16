<?php

use Illuminate\Support\Facades\Route;

// Route::resource('/', function () {
//     return view('welcome');
// });
Route::resource('/', \App\Http\Controllers\RegisterController::class);
Route::resource('/register', \App\Http\Controllers\RegisterController::class);
Route::resource('/login', \App\Http\Controllers\LoginController::class);
Route::resource('/admin', \App\Http\Controllers\AdminController::class);
Route::resource('/profile', \App\Http\Controllers\ProfileController::class);

Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('login.logout');

