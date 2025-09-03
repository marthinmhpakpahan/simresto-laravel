<?php

use App\Http\Controllers\MenuRecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialPurchaseHistoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuImageController;

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
Route::get('/karyawan/show/{karyawan_id}', [KaryawanController::class, 'show'])->name('karyawan.show')->middleware('auth');
Route::get('/karyawan/delete/{karyawan_id}', [KaryawanController::class, 'delete'])->name('karyawan.delete')->middleware('auth');
Route::get('/karyawan/attendance', [KaryawanController::class, 'attendance'])->name('karyawan.attendance')->middleware('auth');
Route::post('/karyawan/attendance', [KaryawanController::class, 'validate_attendance'])->name('karyawan.validate_attendance')->middleware('auth');
Route::get('/karyawan/attendance/confirm/{karyawan_id}/{attendance_id}', [KaryawanController::class, 'confirm_attendance'])->name('karyawan.confirm_attendance')->middleware('auth');
Route::get('/karyawan/attendance/decline/{karyawan_id}/{attendance_id}', [KaryawanController::class, 'decline_attendance'])->name('karyawan.decline_attendance')->middleware('auth');
Route::get('/karyawan/leave', [KaryawanController::class, 'leave'])->name('karyawan.leave')->middleware('auth');
Route::get('/karyawan/leave/create', [KaryawanController::class, 'create_leave'])->name('karyawan.create_leave')->middleware('auth');
Route::post('/karyawan/leave/create', [KaryawanController::class, 'create_leave'])->name('karyawan.create_leave')->middleware('auth');
Route::get('/karyawan/leave/{leave_id}/{action}', [KaryawanController::class, 'leave_action'])->name('karyawan.leave_action')->middleware('auth');
Route::get('/karyawan/admin-leave', [KaryawanController::class, 'admin_leave'])->name('karyawan.admin_leave')->middleware('auth');
Route::get('/karyawan/calendar', [KaryawanController::class, 'calendar'])->name('karyawan.calendar')->middleware('auth');

// Bahan / Material
Route::get('/bahan', [MaterialController::class, 'index'])->name('material.index')->middleware('auth');
Route::get('/bahan/create', [MaterialController::class, 'create'])->name('material.create')->middleware('auth');
Route::post('/bahan/create', [MaterialController::class, 'create'])->name('material.create')->middleware('auth');
Route::get('/bahan/edit/{material_id}', [MaterialController::class, 'edit'])->name('material.edit')->middleware('auth');
Route::post('/bahan/edit/{material_id}', [MaterialController::class, 'edit'])->name('material.edit')->middleware('auth');
Route::get('/bahan/show/{material_id}', [MaterialController::class, 'show'])->name('material.show')->middleware('auth');
Route::get('/bahan/delete/{material_id}', [MaterialController::class, 'delete'])->name('material.delete')->middleware('auth');
Route::post('/bahan/create-combined-material', [MaterialController::class, 'create_combined_material'])->name('material.create_combined_material')->middleware('auth');
Route::get('/bahan/delete-combined-material/{material_id}/{combined_material_id}', [MaterialController::class, 'delete_combined_material'])->name('material.delete_combined_material')->middleware('auth');

// Menu / Resep
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index')->middleware('auth');
Route::get('/menu/show/{menu_id}', [MenuController::class, 'show'])->name('menu.show')->middleware('auth');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create')->middleware('auth');
Route::post('/menu/create', [MenuController::class, 'create'])->name('menu.create')->middleware('auth');
Route::get('/menu/edit/{menu_id}', [MenuController::class, 'edit'])->name('menu.edit')->middleware('auth');
Route::post('/menu/edit/{menu_id}', [MenuController::class, 'edit'])->name('menu.edit')->middleware('auth');
Route::get('/menu/delete/{menu_id}', [MenuController::class, 'delete'])->name('menu.delete')->middleware('auth');

// Resep - Bahan
Route::post('/recipe/create/{menu_id}', [MenuRecipeController::class, 'create'])->name('menurecipe.create')->middleware('auth');
Route::post('/recipe/edit/{menu_id}', [MenuRecipeController::class, 'edit'])->name('menurecipe.edit')->middleware('auth');

// Menu Image
Route::get('/menu/image/delete/{menu_id}/{menu_image_id}', [MenuImageController::class, 'delete'])->name('menu_image.delete')->middleware('auth');

// Menu Recipe
Route::get('/menu/recipe/delete/{menu_id}/{menu_image_id}', [MenuRecipeController::class, 'delete'])->name('menu_recipe.delete')->middleware('auth');

// Material Purchase History
Route::post('/material-purchase-history/create/{material_id}', [MaterialPurchaseHistoryController::class, 'create'])->name('material_purchase_history.create')->middleware('auth');
Route::get('/material-purchase-history/delete/{material_purchase_history_id}', [MaterialPurchaseHistoryController::class, 'delete'])->name('material_purchase_history.delete')->middleware('auth');

// Dashboard
Route::resource('dashboard', 'DashboardController')->except(['show'])->middleware('auth');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::get('/', function () {
    return view('welcome', [
        "title" => "SIMResto",
        "body_class" => "bg-gray-300"
    ]);
});