<?php

namespace App\Http\Controllers\Api;

use App\Models\FoundReport;
use App\Models\MissingPet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoundReportController extends Controller
{
    public function index()
    {
        $foundReports = FoundReport::with('missingPet')->get();
        return view('found_reports.index', compact('foundReports'));
    }

    public function create($missing_pet_id)
    {
        $missingPet = MissingPet::findOrFail($missing_pet_id);
        return view('found_reports.create', compact('missingPet'));
    }

    public function store(Request $request)
{
    $request->validate([
        'missing_pet_id' => 'required|exists:missing_pets,id',
        'location' => 'required|string',
        'description' => 'nullable|string',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Use Google Maps Geocoding API to get latitude and longitude
    if (!$request->has('latitude') || !$request->has('longitude')) {
        $geocodeUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($request->location) . '&key=' . env('GOOGLE_MAPS_API_KEY');
        
        $response = file_get_contents($geocodeUrl);
        $response = json_decode($response);

        if (isset($response->results[0])) {
            $latitude = $response->results[0]->geometry->location->lat;
            $longitude = $response->results[0]->geometry->location->lng;
        } else {
            return redirect()->back()->withErrors(['location' => 'Unable to geocode location']);
        }
    } else {
        $latitude = $request->latitude;
        $longitude = $request->longitude;
    }

    $data = $request->all();
    $data['latitude'] = $latitude;
    $data['longitude'] = $longitude;

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('found_reports', 'public');
    }

    FoundReport::create($data);

    return redirect()->route('found_reports.index')->with('success', 'Sighting reported successfully.');
}


}
