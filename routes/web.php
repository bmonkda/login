<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// dd(User::first()->toArray());


Route::get('/', function () {
    return view('welcome');
});



// Route::get('incidencias/{incidencia}/resolver', [IncidenciaController::class, 'resolver'])->name('admin.incidencias.resolver');
// Route::resource('incidencias', IncidenciaController::class)->names('admin.incidencias');


// Route::get('/login', function() {
//     return 'Página de login';
// });

Route::view('/', 'welcome')->name('welcome');
Route::view('register', 'register')->name('register');
Route::view('login', 'login')->name('login');

Route::view('dashboard', 'dashboard')->name('dashboard');




// Route::post('login', [LoginController::class,'authenticate']);
// Route::post('login', function() {
//     $credentials = request()->only('email', 'password');
    
//     if (Auth::attempt($credentials)) {
//         request()->session()->regenerate();

//         return redirect('welcome');
//         // return redirect()->intended('dashboard');
//     }
//     return redirect('login');
// });