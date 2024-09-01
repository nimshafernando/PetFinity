<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Import the Appointment model
use Illuminate\Support\Facades\Auth; // Import Auth facade if not already imported

class testcontroller extends Controller
{
    public function showTest()
{
    // Assuming that 'start_date' or 'created_at' can be used to determine the most recent appointment
    $appointment = Appointment::where('petowner_id', auth()->id())
                              ->orderByDesc('created_at')  // or 'start_date'
                              ->first();

    return view('test', compact('appointment'));
}

}
