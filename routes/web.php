<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MenuController;

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
Route::get('/bahan', [MaterialController::class, 'index'])->name('material.index')->middleware('auth');
Route::get('/bahan/create', [MaterialController::class, 'create'])->name('material.create')->middleware('auth');
Route::post('/bahan/create', [MaterialController::class, 'create'])->name('material.create')->middleware('auth');
Route::get('/bahan/edit/{karyawan_id}', [MaterialController::class, 'edit'])->name('material.edit')->middleware('auth');
Route::post('/bahan/edit/{karyawan_id}', [MaterialController::class, 'edit'])->name('material.edit')->middleware('auth');
Route::get('/bahan/delete/{karyawan_id}', [MaterialController::class, 'delete'])->name('material.delete')->middleware('auth');

// Menu / Resep
Route::get('/resep', [MenuController::class, 'index'])->name('menu.index')->middleware('auth');
Route::get('/resep/create', [MenuController::class, 'create'])->name('menu.create')->middleware('auth');
Route::post('/resep/create', [MenuController::class, 'create'])->name('menu.create')->middleware('auth');
Route::get('/resep/edit/{karyawan_id}', [MenuController::class, 'edit'])->name('menu.edit')->middleware('auth');
Route::post('/resep/edit/{karyawan_id}', [MenuController::class, 'edit'])->name('menu.edit')->middleware('auth');
Route::get('/resep/delete/{karyawan_id}', [MenuController::class, 'delete'])->name('menu.delete')->middleware('auth');

// Dashboard
Route::resource('dashboard', 'DashboardController')->except(['show'])->middleware('auth');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});