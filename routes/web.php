<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/user',[UserController::class, 'index'])->name('user')->middleware('auth');
Route::post('/user',[UserController::class, 'store'])->name('store_user')->middleware('auth');

Route::get('/driver',[DriverController::class, 'index'])->name('driver')->middleware('auth');
Route::post('/driver',[DriverController::class, 'index'])->name('driver')->middleware('auth');

Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'loginValidation'])->name('loginValidation')->middleware('guest');

Route::get('/register',[AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register',[AuthController::class, 'registerValidation'])->name('registerValidation')->middleware('guest');
