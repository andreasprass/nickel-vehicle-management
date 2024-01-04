<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminDriverController;
use App\Http\Controllers\AdminServisController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\AdminKendaraanController;
use App\Http\Controllers\AdminPemesananController;

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

Route::get('/dashboard',[AdminDashboard::class, 'index'])->name('dashboardmain')->middleware('auth');
Route::get('/',[AdminDashboard::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('persetujuan',PersetujuanController::class)->middleware('admin');

Route::resource('driver',AdminDriverController::class)->middleware('admin');
Route::resource('user',AdminUserController::class)->middleware('admin');
Route::resource('kendaraan',AdminKendaraanController::class)->middleware('admin');
Route::resource('pemesanan',AdminPemesananController::class)->middleware('admin');
Route::resource('service',AdminServisController::class)->middleware('admin');

Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'loginValidation'])->name('loginValidation')->middleware('guest');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register',[AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register',[AuthController::class, 'registerValidation'])->name('registerValidation')->middleware('guest');
