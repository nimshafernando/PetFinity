<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\TaskCompletion;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class PetBoarderAnalyticsController extends Controller
{
    public function index()
    {
        $boardingCenterId = Auth::id();

        // Total Bookings
        $totalBookings = Appointment::where('boardingcenter_id', $boardingCenterId)->count();

        // Completed Tasks
        $completedTasks = TaskCompletion::whereHas('appointment', function ($query) use ($boardingCenterId) {
            $query->where('boardingcenter_id', $boardingCenterId);
        })->count();

        // Average Rating
        $averageRating = Review::where('boardingcenter_id', $boardingCenterId)->avg('rating');

        // Total Reviews
        $reviewsCount = Review::where('boardingcenter_id', $boardingCenterId)->count();

        // Total Pets Handled
        $totalPetsHandled = Pet::whereHas('bookings', function ($query) use ($boardingCenterId) {
            $query->where('boardingcenter_id', $boardingCenterId);
        })->distinct()->count();

        // Monthly Booking Trends
        $monthlyBookings = Appointment::where('boardingcenter_id', $boardingCenterId)
            ->selectRaw('MONTH(start_date) as month, COUNT(*) as total')
            ->groupBy('month')
            ->get();

        return view('pet-boardingcenter.analytics.petboarderanalytics', compact(
            'totalBookings', 'completedTasks', 'averageRating', 'reviewsCount',
            'totalPetsHandled', 'monthlyBookings'
        ));
    }
}