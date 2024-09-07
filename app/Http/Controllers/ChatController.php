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
        $boarders = PetBoardingCenter::all();
        $selectedBoarder = null;

        if ($request->has('boarder_id')) {
            $selectedBoarder = PetBoardingCenter::find($request->input('boarder_id'));
        }

        $senderId = Auth::guard('petowner')->check() ? Auth::guard('petowner')->id() : null;
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
            'receiver_id' => 'required|integer', // Ensure receiver_id is explicitly provided
        ]);

        // Get the authenticated PetOwner's ID
        $senderId = Auth::guard('petowner')->check() ? Auth::guard('petowner')->id() : null;

       
        $chat = new Chat();
        $chat->receiver_user_type = 'boardingcenter';
        $chat->sender_user_type = 'petowner';
        
        $chat->sender_id = $senderId;
        $chat->receiver_id = $request->input('receiver_id'); // Set the receiver ID explicitly
        $chat->message = $request->input('message');
        $chat->seen = false;
        $chat->save();

        if ($senderId) {
            event(new SendPetOwnerMessage($chat));
        } else {
            event(new SendPetBoarderMessage($chat));
        }

        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }


    // Method to fetch messages for Pet Boarders
    public function fetchMessagesForBoarder(Request $request)
    {
        $boarderId = Auth::guard('boardingcenter')->id();
        $owners = PetOwner::whereIn('id', function($query) use ($boarderId) {
            $query->select('sender_id')
                  ->from('chats')
                  ->where('receiver_id', $boarderId)
                  ->orWhere('sender_id', $boarderId)
                  ->distinct();
        })->get();

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
            'receiver_id' => 'required|integer', // Ensure receiver_id is explicitly provided
        ]);
    
        // Get the authenticated PetBoardingCenter's ID
     //   $senderId = Auth::guard('boardingcenter')->check() ? Auth::guard('boardingcenter')->id() : null;
        $senderId = Auth::guard('boardingcenter')->id() ? Auth::guard('boardingcenter')->id() : null;
    
        $chat = new Chat();
        $chat->receiver_user_type = 'petowner';
        $chat->sender_user_type = 'boardingcenter';
        $chat->sender_id = $senderId;
        $chat->receiver_id = $request->input('receiver_id'); // Set the receiver ID explicitly
        $chat->message = $request->input('message');
        $chat->seen = false;
        $chat->save();
    
        event(new SendPetBoarderMessage($chat));
    
        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }
    
}



