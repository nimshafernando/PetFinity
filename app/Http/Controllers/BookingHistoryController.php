<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingHistoryController extends Controller
{

    public function index()
    {
        // Get the logged-in user
        $user_id = Auth::user()->id;

        // Fetch appointments for the logged-in user with related information using joins
        $appointments = DB::table('appointments')
            ->join('pet_boarding_centers', 'appointments.boardingcenter_id', '=', 'pet_boarding_centers.id')
            ->join('pets', 'appointments.pet_id', '=', 'pets.id')
            ->join('pet_owners', 'appointments.petowner_id', '=', 'pet_owners.id')
            ->where('appointments.petowner_id', '=', $user_id)
            ->where('appointments.status', '=', 'accepted')
            ->where('appointments.payment_status', '!=', 'pending')
            ->whereDate('appointments.start_date', '<', Carbon::now()->format('Y-m-d')) // Use whereDate for date comparison
            ->orderBy('appointments.start_date', 'asc')
            ->select(
                'appointments.*',
                'pet_boarding_centers.business_name as boarding_center_name',
                'pets.pet_name as pet_name'
            )
            ->get();
    
        return view('pet-owner.booking_history', compact('appointments'));
    }
    

    public function boardingCenterIndex()
    {
        // Get the logged-in pet boarding center user
        $user_id = Auth::user()->id;

        // Fetch appointments for the logged-in pet boarding center with related information using joins
        $appointments = DB::table('appointments')
            ->join('pet_boarding_centers', 'appointments.boardingcenter_id', '=', 'pet_boarding_centers.id')
            ->join('pets', 'appointments.pet_id', '=', 'pets.id')
            ->join('pet_owners', 'appointments.petowner_id', '=', 'pet_owners.id')
            ->where('appointments.boardingcenter_id', $user_id)
            // ->where('appointments.start_date', '>=', Carbon::today())
            ->orderBy('appointments.start_date', 'asc')
            ->select(
                'appointments.*',
                'pets.pet_name as pet_name',
                'pet_owners.first_name as pet_owner_name'
            )
            ->get();

            return view('pet-boardingcenter.appointmenthistory', compact('appointments'));
}
}
