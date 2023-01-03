<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string'], 
            'password' => ['required', 'string']
        ]);
    
        $remember = $request->filled('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
    
            return redirect()
                ->intended('dashboard')
                ->with('status','Estás logueado');
        }
        // return redirect('login');
        throw ValidationException::withMessages([
            // 'email' => 'Estas credenciales no coinciden con nuestros registros'
            'email' => __('auth.failed')
        ]);
    }
}
