<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

// dd(User::first()->toArray());

Route::get('/', function () {
    return view('welcome');
});


// Route::view('/', 'welcome')/* ->middleware('auth') */;
Route::view('/login', 'auth.login')->name('login')->middleware('guest');
Route::view('/register', 'register');

Route::view('/dashboard', 'dashboard')->middleware('auth');

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

