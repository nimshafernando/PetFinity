<?php

namespace App\Http\Controllers;

use App\Models\PetTrainingCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

// Pet Training Center Management
class PetTrainingCenterController extends Controller
{
    //* Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register-trainingcenter');
    }

    //* Show the dashboard
    public function index()
    {
        return view('pet-trainingcenter.dashboard');
    }

    //* Register the pet training center
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = $request->all();

        // Handle the file upload
        if ($request->hasFile('photos')) {
            $file = $request->file('photos');
            $path = $file->store('uploads', 'public');
            $data['photos'] = $path;
        } else {
            $data['photos'] = null; // Handle the case where no photo is uploaded
        }

        $trainingcenter = $this->create($data);

        Auth::guard('trainingcenter')->login($trainingcenter);

        return redirect()->route('pet-trainingcenter.dashboard');
    }

    //* Validate the registration form ( normally this would be in the same method as the register method )
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'business_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pet_training_centers'],
            'phone_number' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required', 'string', 'max:255'],
            'street_name' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:20'],
            'training_specialization' => ['required', 'array'],
            'preferred_environment' => ['required', 'string', 'max:255'],
            'types_of_pets_trained' => ['required', 'array'],
            'socialmedia_links' => ['nullable', 'string', 'max:255'],
            'joining_goals' => ['required', 'string', 'max:255'],
            'photos' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
    }

    //* Create a new pet training center ( normally this would be in the same method as the register method )
    protected function create(array $data)
    {
        return PetTrainingCenter::create([
            'business_name' => $data['business_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'city' => $data['city'],
            'street_name' => $data['street_name'],
            'postal_code' => $data['postal_code'],
            'training_specialization' => implode(', ', $data['training_specialization']),
            'preferred_environment' => $data['preferred_environment'],
            'types_of_pets_trained' => implode(', ', $data['types_of_pets_trained']),
            'socialmedia_links' => $data['socialmedia_links'],
            'joining_goals' => $data['joining_goals'],
            'photos' => $data['photos'], // Store the photo path
            'registered_date' => now(), // Sets the registered date to the current date
        ]);
    }
}
