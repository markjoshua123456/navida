<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect to home if login is successful
            return redirect()->intended('dashboard')->withSuccess('Login successful');
        }

        // If login fails
        return redirect()->back()->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

