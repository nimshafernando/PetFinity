<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
// Pet Training Profile
class PetTrainingProfileController extends Controller
{

    //* Show the profile
    public function edit()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('pet-trainingcenter.profile', compact('user'));
    }

    //* Update the profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'business_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'city' => 'required|string|max:255',
            'street_name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'training_specialization' => 'required|string|max:255',
            'preferred_environment' => 'required|string|max:255',
            'types_of_pets_trained' => 'array',
            'types_of_pets_trained.*' => 'string|in:dogs,cats,birds,reptiles',
            'socialmedia_links' => 'nullable|string|max:255',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the user
        $user->business_name = $request->business_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->city = $request->city;
        $user->street_name = $request->street_name;
        $user->postal_code = $request->postal_code;
        $user->training_specialization = $request->training_specialization;
        $user->preferred_environment = $request->preferred_environment;
        $user->types_of_pets_trained = implode(', ', (array) $request->types_of_pets_trained);
        $user->socialmedia_links = $request->socialmedia_links;

        // Handle the file uploads
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicture;
        }

        // Handle the photos
        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('business_photos', 'public');
                $photos[] = $path;
            }
            $user->photos = json_encode($photos);
        }

        $user->save();

        return redirect()->route('pet-training.dashboard')->with('success', 'Trainer profile updated successfully!');
    }
}
