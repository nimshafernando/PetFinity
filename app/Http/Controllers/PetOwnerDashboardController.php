<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Pet Owner Dashboard
class PetOwnerDashboardController extends Controller
{

    //* Show the dashboard
    public function index() {
        $pets = auth()->user()->pets;
        return view('pet-owner.mypets', compact('pets'));
    }

    //* Show the pets the user owns and present it in the dashboard
    public function dashboard()
    {
        // Retrieve the ID of the logged-in user
        $userId = Auth::guard('petowner')->user()->id;

        // Retrieve the pets for the logged-in pet owner
        $pets = Pet::where('petowner_id', $userId)->get();

        // Pass the pets to the view
        return view('pet-owner.dashboard', compact('pets'));
    }

    
}
