<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController; 
use App\Http\Controllers\AuthController; 

Route::get('/', [MessageController::class, 'print'])->name('print');
Route::post('/store', [MessageController::class, 'message'])->name('message');
Route::post('/destroy/{id}', [MessageController::class, 'destroy'])->name('destroy');
Route::get('/edit/{id}', [MessageController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [MessageController::class, 'update'])->name('update');
Route::get('/auth', function () {
    return view('auth');
})->name('auth');
Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');