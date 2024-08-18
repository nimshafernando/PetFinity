<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Login Controller for Pet Owner, Pet Boarding Center, and Pet Training Center
class LoginController extends Controller
{
    //* Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }


    //* Login the user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
    
        if (Auth::guard('petowner')->attempt($credentials, $remember)) {
            return redirect()->route('pet-owner.dashboard');
        } elseif (Auth::guard('boardingcenter')->attempt($credentials, $remember)) {
            return redirect()->route('pet-boardingcenter.dashboard');
        } elseif (Auth::guard('trainingcenter')->attempt($credentials, $remember)) {
            return redirect()->route('pet-trainingcenter.dashboard');
        }
    
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    
    //* Logout the user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
