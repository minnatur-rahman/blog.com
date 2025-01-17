<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('forgot-password', [AuthController::class, 'forgot'])->name('forgot');
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');

Route::get('reset/{token}', [AuthController::class, 'reset'])->name('reset');
Route::post('reset/{token}', [AuthController::class, 'post_reset'])->name('post.reset');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'adminuser'], function(){
    Route::get('panel/dashboard',[DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('panel/user/list',[UserController::class, 'user'])->name('user.list');
    Route::get('panel/user/add',[UserController::class, 'add'])->name('user.add');
    Route::post('panel/user/store',[UserController::class, 'store'])->name('user.store');
    Route::get('panel/user/edit/{id}',[UserController::class, 'edit']);
    Route::post('panel/user/edit/{id}',[UserController::class, 'update']);
    Route::get('panel/user/delete/{id}',[UserController::class, 'delete']);

    Route::get('panel/category/list',[CategoryController::class, 'category']);
    Route::get('panel/category/add',[CategoryController::class, 'add']);
    Route::post('panel/category/store',[CategoryController::class, 'store']);
    Route::get('panel/category/edit/{id}',[CategoryController::class, 'edit']);
    Route::post('panel/category/edit/{id}',[CategoryController::class, 'update']);
    Route::get('panel/category/delete/{id}',[CategoryController::class, 'delete']);

    Route::get('panel/blog/list',[BlogController::class, 'blog']);

});
  
