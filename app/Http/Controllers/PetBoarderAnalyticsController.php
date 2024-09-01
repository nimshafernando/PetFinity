<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Review;
use App\Models\TaskCompletion;
use App\Models\Pet;
use App\Models\PetOwner;
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
        $petsHandled = Pet::whereHas('bookings', function ($query) use ($boardingCenterId) {
            $query->where('boardingcenter_id', $boardingCenterId);
        })->get();

        // Monthly Booking Trends
        $monthlyBookings = Appointment::where('boardingcenter_id', $boardingCenterId)
            ->selectRaw('MONTH(start_date) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Total Revenue (sum of total_price where payment_status is 'paid')
    $totalRevenue = Appointment::where('boardingcenter_id', $boardingCenterId)
    ->where('payment_status', 'paid')
    ->sum('total_price');

        // Monthly Revenue (using total_price from Appointment)
        $monthlyRevenue = Appointment::where('boardingcenter_id', $boardingCenterId)
            ->selectRaw('MONTH(start_date) as month, SUM(total_price) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Booking Status Distribution
$bookingStatusDistribution = Appointment::where('boardingcenter_id', $boardingCenterId)
->selectRaw('status, COUNT(*) as count')
->groupBy('status')
->get();


        // Average Length of Stay
        $averageLengthOfStay = Appointment::where('boardingcenter_id', $boardingCenterId)
            ->selectRaw('AVG(DATEDIFF(end_date, start_date)) as avg_stay')
            ->value('avg_stay');

        // Occupancy Rate (example logic)
        $totalAvailableDays = 30; // Example value, calculate based on your data
        $totalOccupiedDays = Appointment::where('boardingcenter_id', $boardingCenterId)
            ->selectRaw('SUM(DATEDIFF(end_date, start_date)) as occupied_days')
            ->value('occupied_days');

        $occupancyRate = ($totalOccupiedDays / $totalAvailableDays) * 100;

        // Top Breeds or Pet Types
        $topBreeds = Pet::whereHas('bookings', function ($query) use ($boardingCenterId) {
            $query->where('boardingcenter_id', $boardingCenterId);
        })->selectRaw('breed, COUNT(*) as count')
        ->groupBy('breed')
        ->orderByDesc('count')
        ->take(5)
        ->get();

        return view('pet-boardingcenter.analytics.petboarderanalytics', compact(
            'totalBookings', 'completedTasks', 'averageRating', 'reviewsCount',
            'petsHandled', 'monthlyBookings', 'totalRevenue', 'monthlyRevenue', 'averageLengthOfStay', 'occupancyRate',
            'topBreeds', 'bookingStatusDistribution' // Add this line
        ));
    }
}
