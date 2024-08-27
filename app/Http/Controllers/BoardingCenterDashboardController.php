<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BoardingCenterDashboardController extends Controller
{

    public function pendingBookings()
    {
        $boardingCenterId = Auth::user()->id;

        $pendingAppointments = DB::table('appointments')
            ->join('pets', 'appointments.pet_id', '=', 'pets.id')
            ->join('pet_owners', 'appointments.petowner_id', '=', 'pet_owners.id')
            ->where('appointments.boardingcenter_id', $boardingCenterId)
            ->where('appointments.status', 'pending')
            ->select(
                'appointments.*',
                'pets.pet_name as pet_name',
                'pets.type as pet_type',
                'pet_owners.first_name as pet_owner_name'
            )
            ->get();

        return view('pet-boardingcenter.pendingbookings', compact('pendingAppointments'));
    }
    
    public function petProfiles()
{
    // Get the logged-in user
    $user_id = Auth::user()->id;

    // Fetch distinct pet profiles that had appointments for the logged-in boarding center
    $pets = DB::table('appointments')
        ->join('pet_boarding_centers', 'appointments.boardingcenter_id', '=', 'pet_boarding_centers.id')
        ->join('pets', 'appointments.pet_id', '=', 'pets.id')
        ->join('pet_owners', 'appointments.petowner_id', '=', 'pet_owners.id')
        ->where('pet_boarding_centers.id', $user_id)  // Assuming boarding centers are identified by user_id
        ->select(
            'pets.*',
            'appointments.special_notes',
            'pets.profile_picture'
        )
        ->distinct()
        ->get();

    return view('pet-boardingcenter.showpetprofile', compact('pets'));
}





}
