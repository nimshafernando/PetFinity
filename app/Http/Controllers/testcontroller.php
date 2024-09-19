<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Import the Appointment model
use Illuminate\Support\Facades\Auth; // Import Auth facade if not already imported

class testcontroller extends Controller
{
    public function showTest($id)
    {
        // Fetch the specific appointment based on the provided ID and make sure it belongs to the authenticated user
        $appointment = Appointment::where('petowner_id', auth()->id())
                                  ->where('id', $id)
                                  ->with('pet', 'boardingCenter')
                                  ->firstOrFail();  // Fail if not found

        return view('pet-owner.test', compact('appointment'));
    }
}
