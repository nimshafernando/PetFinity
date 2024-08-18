<?php

namespace App\Http\Controllers;

use App\Models\PetBoardingCenter;
use Illuminate\Http\Request;

// Display boarding centers
class BoardingCenterDisplayController extends Controller
{
    //* Display all boarding centers
    public function index()
    {
        $boardingCenters = PetBoardingCenter::all();
        return view('pet-owner.boardingcenter.list', compact('boardingCenters'));
    }

    //* Display a specific boarding center
    public function show($id)
    {
        $boardingCenter = PetBoardingCenter::findOrFail($id);
        return view('pet-owner.boardingcenter.detail', compact('boardingCenter'));
    }

    
}
