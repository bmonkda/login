<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email', 'string'], 
        //     'password' => ['required', 'string']
        // ]);
    
        $remember = $request->filled('remember');

        $user = User::where('correo', $request->email)->first();

        // return $user;

        if ( $user->clave === md5($request->password) ) {
            Auth::login($user);

            $user->update(['clave' => Hash::make($request->password)]);

            $request->session()->regenerate();

            return redirect()->intended('dashboard')
                ->with('status','Estás logueado');
        }

    
        // if (Auth::attempt($credentials, $remember)) {

        // if (Auth::attempt($request->only('email','password'), $remember)) {
        if (Hash::check($request->password, $user->clave)) {
            Auth::login($user);
            
            $request->session()->regenerate();
    
            return redirect()->intended('dashboard')
                ->with('status','Estás logueado');
        }


        // return redirect('login');
        throw ValidationException::withMessages([
            // 'email' => 'Estas credenciales no coinciden con nuestros registros'
            'email' => __('auth.failed')
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Sesión cerrada');
    }
}
