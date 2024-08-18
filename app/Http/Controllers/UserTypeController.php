<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// User Type Controller
class UserTypeController extends Controller
{

    //* Show the user type selection form
    public function index() {
        return view('auth.select-role');
    }

    //* Store the user type in the session and redirect to the appropriate registration form
    public function store(Request $request) {

        $userType = $request->input('user_type');
        $request->session()->put('user_type', $userType);

        if ($userType === 'Pet-Owner') {
            return redirect()->route('pet-owner.register');
        } elseif ($userType === 'Boarding-Center') {
            return redirect()->route('pet-boardingcenter.register');
        } else {
            return redirect()->route('pet-trainingcenter.register');
        }
    }
    
}
