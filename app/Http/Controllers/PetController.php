<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    // Show the form for adding a pet
    public function addpetform()
    {
        $user = Auth::user();
        $pets = Pet::where('petowner_id', $user->id)->get();
        return view('pet-profile.add-pet', compact('pets'));
    }

    // Show the form for choosing a pet type
    public function pettype()
    {
        return view('pet-profile.pet-type');
    }

    // Show the form for creating a pet
    public function create()
    {
        return view('pet-profile.pet-form');
    }

    // Store a new pet

    //* Store a new pet
    public function store(Request $request)
    {
        $request->validate([
            'pet_name' => 'required|string|max:255',
            'type' => 'required|string',
            'breed' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'know_age' => 'required|string',
            'estimated_age' => 'nullable|string',
            'exact_age' => 'nullable|numeric',
            'is_castrated' => 'required|string',
            'gender' => 'required|string',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'medical_conditions' => 'array',
            'dietary_restrictions' => 'array',
            'behavioral_notes' => 'array',
        ]);

        $finalAge = $request->know_age === 'yes' ? $request->exact_age : $request->estimated_age;

        $pet = new Pet;
        $pet->petowner_id = Auth::id();
        $pet->pet_name = $request->pet_name;
        $pet->breed = $request->breed;
        $pet->type = $request->type;

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('pet_profile', 'public');
            $pet->profile_picture = $imagePath;
        }

        $pet->age = $finalAge; // Correctly assign finalAge
        $pet->is_castrated = $request->is_castrated;
        $pet->gender = $request->gender;
        $pet->weight = $request->weight;
        $pet->height = $request->height;

        $pet->medical_conditions  = implode(', ', $request->medical_conditions);
        $pet->dietary_restrictions  = implode(', ', $request->dietary_restrictions);
        $pet->behavioral_notes  = implode(', ', $request->behavioral_notes);
        $pet->save();

        return redirect()->route('pet-owner.dashboard')->with('success', 'Pet profile created successfully!');
    }

    // Show the form for editing a pet
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pet-profile.edit-pet', compact('pet'));
    }

    // Show the pet profile
        public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return response()->json($pet);
    }

        public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return redirect()->route('pet-owner.dashboard');
    }
    
    public function update(Request $request, Pet $pet)
{
    // Validate the request data
    $request->validate([
        'pet_name' => 'required|string|max:255',
        'breed' => 'required|string|max:255',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'know_age' => 'required|string',
        'estimated_age' => 'nullable|string',
        'exact_age' => 'nullable|numeric',
        'is_castrated' => 'required|string',
        'gender' => 'required|string',
        'weight' => 'required|numeric',
        'height' => 'required|numeric',
        'medical_conditions' => 'array',
        'dietary_restrictions' => 'array',
        'behavioral_notes' => 'array',
    ]);

    // Determine the final age to be stored in the database
    $finalAge = $request->know_age === 'yes' ? $request->exact_age : $request->estimated_age;

    // Update pet details
    $pet->pet_name = $request->pet_name;
    $pet->breed = $request->breed;

    // Handle profile picture upload
    if ($request->hasFile('profile_picture')) {
        // Delete the old profile picture if it exists
        if ($pet->profile_picture) {
            Storage::disk('public')->delete($pet->profile_picture);
        }
        // Store the new profile picture
        $imagePath = $request->file('profile_picture')->store('pet_profile', 'public');
        $pet->profile_picture = $imagePath;
    }

    // Update the remaining fields
    $pet->age = $finalAge; // Correctly assign finalAge
    $pet->is_castrated = $request->is_castrated;
    $pet->gender = $request->gender;
    $pet->weight = $request->weight;
    $pet->height = $request->height;

    $pet->medical_conditions  = implode(', ', $request->medical_conditions);
    $pet->dietary_restrictions  = implode(', ', $request->dietary_restrictions);
    $pet->behavioral_notes  = implode(', ', $request->behavioral_notes);

    // Save the updated pet
    $pet->save();

    // Redirect back to the pet owner's dashboard with a success message
    return redirect()->route('pet-owner.dashboard')->with('success', 'Pet profile updated successfully!');
}

}