<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

// $password = Hash::make('admin');
// echo $password; exit;

// Authentication
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->name('login')->middleware('guest');

// Dashboard
Route::resource('dashboard', 'DashboardController')->except(['show'])->middleware('auth');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});