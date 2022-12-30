<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// dd(User::first()->toArray());


Route::get('/', function () {
    return view('welcome');
});


// Route::get('/login', function() {
//     return 'Página de login';
// });

Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');