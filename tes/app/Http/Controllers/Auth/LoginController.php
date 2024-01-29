<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect to intended page or dashboard
            return redirect()->intended('/home');
        }

        // Authentication failed, return back with errors
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
