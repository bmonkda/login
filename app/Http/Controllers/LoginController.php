<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // return $credentials;
 

        $user = User::where('email', $request->password);

        if ( $user && $request->password === md5($user->password) ) {
            # code...
            return 'Logueado';
            return back();
        }

        /* if (Auth::attempt(['email' => $email, 'password' => $password, 'id_statu' => 1])) {
            // Authentication was successful...
        } */
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('welcome');
            // return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
