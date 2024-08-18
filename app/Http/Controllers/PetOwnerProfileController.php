<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Pet Owner Profile
class PetOwnerProfileController extends Controller
{
    //* Show the profile
    public function edit()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('pet-owner.profile', compact('user'));
    }

    //* Update the profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
            'pets_owned' => 'required|integer|min:0',
            'referral_source' => 'required|string|in:friend,onlinesearch,socialmedia,advertisement,other',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->pets_owned = $request->pets_owned;
        $user->referral_source = $request->referral_source;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('pet-owner.dashboard')->with('success', 'Profile updated successfully!');
    }
}
