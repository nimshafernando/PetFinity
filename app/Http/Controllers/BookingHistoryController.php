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

        // Fetch past appointments for the logged-in pet owner with related information using joins
        // We are not relying on 'status' being 'completed' since it's not fully implemented
        $appointments = DB::table('appointments')
            ->join('pet_boarding_centers', 'appointments.boardingcenter_id', '=', 'pet_boarding_centers.id')
            ->join('pets', 'appointments.pet_id', '=', 'pets.id')
            ->where('appointments.petowner_id', '=', $user_id)
            ->where('appointments.end_date', '<', Carbon::now()) // Show only past appointments based on the end date
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
        // We are fetching all relevant appointments regardless of status or payment method
        $appointments = DB::table('appointments')
            ->join('pet_boarding_centers', 'appointments.boardingcenter_id', '=', 'pet_boarding_centers.id')
            ->join('pets', 'appointments.pet_id', '=', 'pets.id')
            ->join('pet_owners', 'appointments.petowner_id', '=', 'pet_owners.id')
            ->where('appointments.boardingcenter_id', $user_id)
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
