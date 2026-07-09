<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return Auth::check() ? redirect()->route('home') : redirect()->route('login');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/about', function () {
    return 'Chào Framework Laravel';
});

Route::get('/users', [UserController::class, 'index']);

Route::get('register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'login'])->name('login');

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/manager', [ManagerController::class, 'index'])->middleware('auth')->name('manager');

Route::get('/employee', [EmployeeController::class, 'index'])->middleware('auth')->name('employee');