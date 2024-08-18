<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Pet Boarding Center Profile Management
class PetBoardingProfileController extends Controller
{
    //* Show the profile form
    public function edit()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('pet-boardingcenter.profile', compact('user'));
    }

    //* Update the profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'business_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'street_name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'animal_types' => 'array',
            'animal_types.*' => 'string|in:dogs,cats,birds,reptiles',
            'start_operating_hour' => 'required|string',
            'end_operating_hour' => 'required|string',
            'special_amenities' => 'nullable|string|max:255',
            'socialmedia_links' => 'nullable|string|max:255',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'joining_goals' => 'required|string|in:increase_customer_base,offer_new_services,improve_brand_recognition',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->business_name = $request->business_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->city = $request->city;
        $user->street_name = $request->street_name;
        $user->postal_code = $request->postal_code;
        $user->animal_types = implode(', ', (array) $request->animal_types);
        $user->operating_hours = $request->start_operating_hour . '-' . $request->end_operating_hour;
        $user->special_amenities = $request->special_amenities;
        $user->socialmedia_links = $request->socialmedia_links;
        $user->joining_goals = $request->joining_goals;

        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicture;
        }

        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('business_photos', 'public');
                $photos[] = $path;
            }
            $user->photos = json_encode($photos);
        }

        $user->save();

        return redirect()->route('pet-boardingcenter.dashboard')->with('success', 'Pet profile created successfully!');
    }
}
