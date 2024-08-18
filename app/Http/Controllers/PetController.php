<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Pet Profile Management
class PetController extends Controller
{
    //* Show the form for adding a pet
    public function addpetform()
    {
        $user = Auth::user();

        $pets = Pet::where('petowner_id', $user->id)->get();

        return view('pet-profile.add-pet', compact('pets'));
    }

    //* Show the form for choosing a pet type
    public function pettype()
    {
        return view('pet-profile.pet-type');
    }

    //* Show the form for creating a pet
    public function create()
    {
        return view('pet-profile.pet-form');
    }


    //* Store a new pet
    public function store(Request $request)
    {
        $request->validate([
            'pet_name' => 'required|string|max:255',
            'type' => 'required|string',
            'breed' => 'required|string|max:255',
            'petPhoto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/pets'), $fileName);
            $pet->photo = 'uploads/pets/' . $fileName;
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

    //* Show the form for editing a pet
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pet-profile.edit-pet', compact('pet'));
    }


    //* Show the pet profile
    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return response()->json($pet);
    }


    //* Update the pet information
    public function update(Request $request, $id)
    {
        $request->validate([
            // Validation rules as before
        ]);
    
        $pet = Pet::findOrFail($id);
    
        $finalAge = $request->know_age === 'yes' ? $request->exact_age : $request->estimated_age;
    
        $pet->pet_name = $request->pet_name;
        $pet->breed = $request->breed;
    
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/pets'), $fileName);
            $pet->photo = 'uploads/pets/' . $fileName;
        }
    
        $pet->age = $finalAge;
        $pet->is_castrated = $request->is_castrated;
        $pet->gender = $request->gender;
        $pet->weight = $request->weight;
        $pet->height = $request->height;
    
        $pet->medical_conditions  = implode(', ', $request->medical_conditions);
        $pet->dietary_restrictions  = implode(', ', $request->dietary_restrictions);
        $pet->behavioral_notes  = implode(', ', $request->behavioral_notes);
        
        $pet->save();
    
        return redirect()->route('pet-owner.dashboard')->with('success', 'Pet profile updated successfully!');
    }
    
}