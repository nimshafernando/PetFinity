<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($appointment_id)
    {
        $appointment = Appointment::with('boardingcenter')->findOrFail($appointment_id);

        // Ensure the pet owner is authorized to leave a review
        if ($appointment->petowner_id != Auth::id()) {
            return redirect()->back()->withErrors('Unauthorized action.');
        }

        return view('reviews.create', compact('appointment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        $appointment = Appointment::findOrFail($request->appointment_id);

        // Ensure the pet owner is authorized to leave a review
        if ($appointment->petowner_id != Auth::id()) {
            return redirect()->back()->withErrors('Unauthorized action.');
        }

        // Create the review
        Review::create([
            'appointment_id' => $appointment->id,
            'petowner_id' => $appointment->petowner_id,
            'boardingcenter_id' => $appointment->boardingcenter_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('booking.history')->with('success', 'Review submitted successfully.');
    }
}
