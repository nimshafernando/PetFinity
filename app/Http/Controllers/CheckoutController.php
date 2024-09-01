<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Import the Appointment model
use Illuminate\Support\Facades\Auth; // Import Auth facade if not already imported


class CheckoutController extends Controller
{
    public function show()
    {
        // Retrieve appointments for the currently logged-in pet owner
        // Make sure that 'auth()->user()' returns an instance of the PetOwner model
        // Adjust 'auth()->id()' to 'auth('petowner')->id()' if you are using a custom guard for pet owners
        $appointments = Appointment::where('petowner_id', auth('petowner')->id())->get();

        // Pass the appointments data to the 'test' view
        return view('checkout', compact('appointments'));
    }
}