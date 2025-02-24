<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;

// $password = Hash::make('admin');
// echo $password; exit;

// Users
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->name('login')->middleware('guest');
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index')->middleware('auth');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create')->middleware('auth');
Route::post('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create')->middleware('auth');
Route::get('/karyawan/edit/{karyawan_id}', [KaryawanController::class, 'edit'])->name('karyawan.edit')->middleware('auth');
Route::post('/karyawan/edit/{karyawan_id}', [KaryawanController::class, 'edit'])->name('karyawan.edit')->middleware('auth');
Route::get('/karyawan/delete/{karyawan_id}', [KaryawanController::class, 'delete'])->name('karyawan.delete')->middleware('auth');

// Bahan / Material
Route::get('/bahan', [MaterialController::class, 'index'])->name('bahan.index')->middleware('auth');
Route::get('/bahan/create', [MaterialController::class, 'create'])->name('bahan.create')->middleware('auth');
Route::post('/bahan/create', [MaterialController::class, 'create'])->name('bahan.create')->middleware('auth');
Route::get('/bahan/edit/{karyawan_id}', [MaterialController::class, 'edit'])->name('bahan.edit')->middleware('auth');
Route::post('/bahan/edit/{karyawan_id}', [MaterialController::class, 'edit'])->name('bahan.edit')->middleware('auth');
Route::get('/bahan/delete/{karyawan_id}', [MaterialController::class, 'delete'])->name('bahan.delete')->middleware('auth');

// Menu / Resep

// Dashboard
Route::resource('dashboard', 'DashboardController')->except(['show'])->middleware('auth');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});