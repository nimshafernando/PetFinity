<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\PetOwner;
use App\Models\PetBoardingCenter;
use Illuminate\Support\Facades\Auth;
use App\Events\SendPetOwnerMessage;
use App\Events\SendPetBoarderMessage;

class ChatController extends Controller
{
    // Method to fetch messages for Pet Owners
    public function fetchMessages(Request $request)
    {
        // Fetch all Pet Boarding Centers
        $boarders = PetBoardingCenter::all();

        // Determine the selected boarding center if provided
        $selectedBoarder = null;
        if ($request->has('boarder_id')) {
            $selectedBoarder = PetBoardingCenter::find($request->input('boarder_id'));
        }

        // Determine the sender based on the authenticated user (PetOwner or PetBoardingCenter)
        $senderId = Auth::guard('petowner')->check() ? Auth::guard('petowner')->id() : Auth::guard('boardingcenter')->id();
        $receiverId = $selectedBoarder ? $selectedBoarder->id : null;

        $messages = collect();
        if ($receiverId) {
            $messages = Chat::where(function($query) use ($senderId, $receiverId) {
                $query->where('sender_id', $senderId)
                      ->where('receiver_id', $receiverId);
            })->orWhere(function($query) use ($senderId, $receiverId) {
                $query->where('sender_id', $receiverId)
                      ->where('receiver_id', $senderId);
            })->orderBy('created_at', 'asc')->get();
        }

        // Pass the necessary data to the view
        return view('pet-owner.chats', [
            'boarders' => $boarders,
            'selectedBoarder' => $selectedBoarder,
            'messages' => $messages
        ]);
    }

    // Method to send messages for Pet Owners
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|integer', // Validate that the receiver_id is provided
        ]);

        // Determine the sender based on the authenticated user (PetOwner or PetBoardingCenter)
        $senderId = Auth::guard('petowner')->check() ? Auth::guard('petowner')->id() : Auth::guard('boardingcenter')->id();

        $chat = new Chat();
        $chat->sender_id = $senderId;
        $chat->receiver_id = $request->input('receiver_id');
        $chat->message = $request->input('message');
        $chat->seen = false; // Default to not seen
        $chat->save();

        // Broadcast the message using the appropriate event
        if (Auth::guard('petowner')->check()) {
            event(new SendPetOwnerMessage($chat));
        } else {
            event(new SendPetBoarderMessage($chat));
        }

        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }

    // Method to fetch messages for Pet Boarders
    public function fetchMessagesForBoarder(Request $request)
{
    // Get the authenticated Pet Boarder ID
    $boarderId = Auth::guard('boardingcenter')->id();

    // Fetch Pet Owners who have either sent or received messages from the authenticated Pet Boarder
    $owners = PetOwner::whereIn('id', function($query) use ($boarderId) {
        $query->select('sender_id')
              ->from('chats')
              ->where('receiver_id', $boarderId)
              ->orWhere('sender_id', $boarderId)
              ->distinct();
    })->get();

    // Determine the selected pet owner if provided
    $selectedOwner = null;
    if ($request->has('owner_id')) {
        $selectedOwner = PetOwner::find($request->input('owner_id'));
    }

    $receiverId = $selectedOwner ? $selectedOwner->id : null;

    $messages = collect();
    if ($receiverId) {
        $messages = Chat::where(function($query) use ($boarderId, $receiverId) {
            $query->where('sender_id', $boarderId)
                  ->where('receiver_id', $receiverId);
        })->orWhere(function($query) use ($boarderId, $receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', $boarderId);
        })->orderBy('created_at', 'asc')->get();
    }

    // Pass the necessary data to the view
    return view('pet-boardingcenter.chats', [
        'owners' => $owners,
        'selectedOwner' => $selectedOwner,
        'messages' => $messages,
        'authUserId' => $boarderId,
    ]);
}


    // Method to send messages for Pet Boarders
    public function sendMessageForBoarder(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|integer', // Validate that the receiver_id is provided
        ]);

        // Determine the sender based on the authenticated user (PetBoardingCenter)
        $senderId = Auth::guard('boardingcenter')->id();

        $chat = new Chat();
        $chat->sender_id = $senderId;
        $chat->receiver_id = $request->input('receiver_id');
        $chat->message = $request->input('message');
        $chat->seen = false; // Default to not seen
        $chat->save();

        // Broadcast the message using the appropriate event
        event(new SendPetBoarderMessage($chat));

        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }
}
