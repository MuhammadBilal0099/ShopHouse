<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'HomePage'])->name('home');

Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('user-login', [LoginController::class, 'userLogin'])->name('userLogin');
