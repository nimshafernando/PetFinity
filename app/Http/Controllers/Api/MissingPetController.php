<?php

namespace App\Http\Controllers\Api;

use App\Models\MissingPet;
use App\Models\Pet;
use App\Models\FoundReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MissingPetController extends Controller
{
    public function index()
    {
        $missingPets = MissingPet::with('pet')->get();
        return view('missing_pets.index', compact('missingPets'));
    }

    public function create()
    {
        $pets = Pet::where('petowner_id', Auth::id())->get();
        return view('missing_pets.create', compact('pets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'last_seen_location' => 'required|string',
            'last_seen_date' => 'required|date',
            'last_seen_time' => 'required',
            'distinguishing_features' => 'required|string',
            'additional_info' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Use Google Maps Geocoding API to get latitude and longitude
        $geocodeUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($request->last_seen_location) . '&key=' . env('GOOGLE_MAPS_API_KEY');

        $response = file_get_contents($geocodeUrl);
        $response = json_decode($response);

        if (isset($response->results[0])) {
            $latitude = $response->results[0]->geometry->location->lat;
            $longitude = $response->results[0]->geometry->location->lng;
        } else {
            return redirect()->back()->withErrors(['last_seen_location' => 'Unable to geocode location']);
        }

        $data = $request->all();
        $data['last_seen_location_latitude'] = $latitude;
        $data['last_seen_location_longitude'] = $longitude;

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('missing_pets', 'public');
        }

        $data['petowner_id'] = Auth::id();

        MissingPet::create($data);

        return redirect()->route('missing_pets.index')->with('success', 'Missing pet reported successfully.');
    }

    public function map()
    {
        $missingPets = MissingPet::with('pet')->get();
        $sightings = FoundReport::all(); // Fetch sightings as well
        return view('missing_pets.map', compact('missingPets', 'sightings'));
    }

   
    
}
