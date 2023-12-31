<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminDriverController;

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

Route::get('/user',[AdminUserController::class, 'index'])->name('user')->middleware('auth');
Route::get('/user-create',[AdminUserController::class, 'create'])->name('create_user')->middleware('auth');
Route::post('/user-add',[AdminUserController::class, 'store'])->name('store_user')->middleware('auth');
Route::get('/user-edit/{id}',[AdminUserController::class, 'edit'])->name('edit_user')->middleware('auth');
Route::post('/user-update',[AdminUserController::class, 'update'])->name('update_user')->middleware('auth');
Route::delete('/user-destroy/{id}',[AdminUserController::class, 'destroy'])->name('destroy_user')->middleware('auth');

Route::resource('driver',AdminDriverController::class)->middleware('auth');

Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'loginValidation'])->name('loginValidation')->middleware('guest');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register',[AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register',[AuthController::class, 'registerValidation'])->name('registerValidation')->middleware('guest');
