<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticateSessionController extends Controller
{
    function store(Request $request){
        $user_session = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if(Auth::attempt($user_session , $request->boolean('remember'))){
            
            $request->session()->regenerate();
    
            return redirect()->intended()->with('session', 'Usuario Loggeado');
            
        }else{
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }

    }

    function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('session', 'Usuario Desloggeado');
    }

    function isAdmin() {
        return true;
    }
}

