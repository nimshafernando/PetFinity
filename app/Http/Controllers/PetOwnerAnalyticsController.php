<?php

// app/Http/Controllers/PetOwnerAnalyticsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissingPet;
use App\Models\FoundReport;

class PetOwnerAnalyticsController extends Controller
{
    public function showLostAndFoundAnalytics()
    {
        $missingPets = MissingPet::with('sightings')->get();
        $foundReports = FoundReport::with('missingPet')->get();

        return view('pet-owner.analytics.lostandfound', compact('missingPets', 'foundReports'));
    }
}