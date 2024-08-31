<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\PetBoardingCenter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//Registering a Pet Boarding Center
class PetBoardingCenterController extends Controller
{
    //* Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register-boardingcenter');
    }

    public function index()
    {
        $boardingCenterId = Auth::id();
    
        // Calculate the total revenue correctly
        $totalRevenue = Appointment::where('boardingcenter_id', $boardingCenterId)
            ->where('status', 'accepted')
            ->sum('total_price');
    
        return view('pet-boardingcenter.dashboard', compact('totalRevenue'));
    }
    

    //* Show the dashboard
    //public function index()
    //{
       // return view('pet-boardingcenter.dashboard');
    //}

    //* Register the pet boarding center
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
    
        $data = $request->all();
    
        // Handle the file upload
        if ($request->hasFile('photos')) {
            $photoPaths = [];
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads', 'public');
                $photoPaths[] = $path;
            }
            $data['photos'] = $photoPaths; // Store paths as an array
        } else {
            $data['photos'] = []; // Handle the case where no photos are uploaded
        }
    
        $boardingcenter = $this->create($data);
    
        Auth::guard('boardingcenter')->login($boardingcenter);
    
        return redirect()->route('pet-boardingcenter.dashboard');
    }
    
    //* Validate the registration form ( normally this would be in the same method as the register method )
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'business_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pet_boarding_centers'],
            'phone_number' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'animal_types' => ['required', 'array',],
            'city' => ['required', 'string', 'max:255'],
            'street_name' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:20'],
            'start_operating_hour' => 'required',
            'end_operating_hour' => 'required',
            'special_amenities' => ['required', 'string', 'max:255'],
            'socialmedia_links' => ['nullable', 'string', 'max:255'],
            'joining_goals' => ['required', 'string', 'max:255'],
            'price_per_night' => ['required', 'numeric', 'min:0'],  // Add this line
        ]);
    }

    //* Create a new pet boarding center ( normally this would be in the same method as the register method )
    protected function create(array $data)
    {
        return PetBoardingCenter::create([
            'business_name' => $data['business_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'animal_types' => implode(', ', $data['animal_types']),
            'city' => $data['city'],
            'street_name' => $data['street_name'],
            'postal_code' => $data['postal_code'],
            'operating_hours' => $data['start_operating_hour'] . '-' . $data['end_operating_hour'] ,
            'special_amenities' => $data['special_amenities'],
            'socialmedia_links' => $data['socialmedia_links'],
            'photos' => $data['photos'], // Store the JSON encoded photo paths
            'joining_goals' => $data['joining_goals'],
            'price_per_night' => $data['price_per_night'],  // Add this line
            'registered_date' => now(), // Sets the registered date to the current date
        ]);
    }
    public function updatePricePerNight(Request $request)
{
    $request->validate([
        'price_per_night' => 'required|numeric|min:0',
    ]);

    // Find the boarding center by ID using the current authenticated user
    $boardingCenter = PetBoardingCenter::find(Auth::guard('boardingcenter')->id());

    // Update the price per night for the boarding center
    $boardingCenter->update([
        'price_per_night' => $request->price_per_night,
    ]);

    return redirect()->route('pet-boardingcenter.dashboard')->with('success', 'Price per night updated successfully!');
}

    
    
    

}
