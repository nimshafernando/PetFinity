<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Upcoming Appointments
class UpcomingController extends Controller
{

    //* show upcoming appointments for pet owners
    public function index()
    {
        // Get the logged-in user
        $user_id = Auth::user()->id;

        // Fetch upcoming appointments for the logged-in user with related information using joins
        $appointments = DB::table('appointments')
            ->join('pet_boarding_centers', 'appointments.boardingcenter_id', '=', 'pet_boarding_centers.id')
            ->join('pets', 'appointments.pet_id', '=', 'pets.id')
            ->join('pet_owners', 'appointments.petowner_id', '=', 'pet_owners.id')
            ->where('appointments.petowner_id', '=', $user_id)
            ->where('appointments.status', '=', 'accepted')
            ->where('appointments.payment_status', '!=', 'pending')
            ->where('appointments.start_date', '>=', Carbon::now())  // Filter for upcoming appointments
            ->orderBy('appointments.start_date', 'asc')
            ->select(
                'appointments.*',
                'pet_boarding_centers.business_name as boarding_center_name',
                'pets.pet_name as pet_name'
            )
            ->get();

            return view('pet-owner.upcoming', compact('appointments'));
    }

    //* show upcoming appointments for pet boarding centers
        public function boardingCenterIndex()
        {
            // Get the logged-in user
            $user_id = Auth::user()->id;

            // Fetch upcoming appointments for the boarding center with related information using joins
            $appointments = DB::table('appointments')
                ->join('pet_boarding_centers', 'appointments.boardingcenter_id', '=', 'pet_boarding_centers.id')
                ->join('pets', 'appointments.pet_id', '=', 'pets.id')
                ->join('pet_owners', 'appointments.petowner_id', '=', 'pet_owners.id')
                ->where('pet_boarding_centers.id', $user_id)  // Assuming boarding centers are identified by user_id
                ->where('appointments.start_date', '>=', Carbon::now())  // Filter for upcoming appointments
                ->orderBy('appointments.start_date', 'asc')
                ->select(
                    'appointments.*',
                    'pets.pet_name as pet_name',
                    'pet_owners.first_name as pet_owner_name'
                )
                ->get();

            return view('pet-boardingcenter.upcoming', compact('appointments'));
        }
}
