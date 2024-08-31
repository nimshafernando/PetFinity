<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\PetBoardingCenter;

// Display boarding centers
class BoardingCenterDisplayController extends Controller
{
    //* Display all boarding centers
    public function index()
    {
        // Fetch all boarding centers along with their reviews
        $boardingCenters = PetBoardingCenter::with('reviews')->get();

        // Calculate the average rating for each boarding center
        foreach ($boardingCenters as $center) {
            $center->average_rating = $center->reviews()->avg('rating');
        }

        // Pass the boarding centers with their average ratings to the view
        return view('pet-owner.boardingcenter.list', compact('boardingCenters'));
    }

    //* Display a specific boarding center
    public function show($id)
    {
        $boardingCenter = PetBoardingCenter::findOrFail($id);

        // Fetch reviews related to this boarding center
        $reviews = Review::where('boardingcenter_id', $id)->paginate(10); // Adjust the pagination as needed

        return view('pet-owner.boardingcenter.detail', compact('boardingCenter', 'reviews'));
    }
}
