<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            return redirect()->intended('dashboard');
        }
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $cred = $request->only('username', 'password');

        if(Auth::attempt($cred)){
            $request->session()->regenerate();
            $user = Auth::user();

            if($user) {
                return redirect()->intended('dashboard');
            }

            return redirect()->intended('login');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah'
        ])->onlyInput('username');
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
