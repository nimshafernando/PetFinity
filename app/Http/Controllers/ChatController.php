<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Appointment;
use App\Models\PetOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function showChat($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);

        // Determine the receiver based on the logged-in user
        if (Auth::id() === $appointment->petOwner->id) {
            $receiver = $appointment->boardingCenter;
        } else {
            $receiver = $appointment->petOwner;
        }

        return view('chat', [
            'appointment' => $appointment,
            'receiver' => $receiver
        ]);
    }
    public function send(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'message' => 'required|string',
            'receiver_id' => 'required|integer',
            'receiver_type' => 'required|in:pet_owner,pet_boarding_center',
        ]);

        $senderType = Auth::user() instanceof \App\Models\PetOwner ? 'pet_owner' : 'pet_boarding_center';

        $message = Message::create([
            'sender_id' => Auth::id(),
            'sender_type' => $senderType,
            'receiver_id' => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'appointment_id' => $request->appointment_id,
            'message' => $request->message,
        ]);

        return response()->json(['message' => $message], 201);
    }

    public function fetchMessages(Appointment $appointment)
    {
        $messages = Message::where('appointment_id', $appointment->id)
                            ->with(['sender', 'receiver'])
                            ->get();

        return response()->json(['messages' => $messages]);
    }
}
