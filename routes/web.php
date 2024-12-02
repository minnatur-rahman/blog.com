<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'auth_login']);
Route::get('register', [AuthController::class, 'register'])->name("register");
Route::post('register-user', [AuthController::class, 'register_user'])->name("register.user");
Route::get('verify/{token}', [AuthController::class, 'verify'])->name('verify.user');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
  
