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

Route::view('/', 'welcome');
Route::view('/login', 'login')->name('login')->middleware('guest');
Route::view('/register', 'register');

Route::view('/dashboard', 'dashboard')->middleware('auth');

Route::post('login', function () {
    $credentials = request()->only('email', 'password');

    $remember = request()->filled('remember');

    if (Auth::attempt($credentials, $remember)) {
        request()->session()->regenerate();

        return redirect('dashboard');
    }
    return redirect('login');
});


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