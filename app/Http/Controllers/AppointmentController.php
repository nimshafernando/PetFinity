<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\PetBoardingCenter;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //* Booking a boarding center
    public function create($boardingCenterId)
    {
        $boardingCenter = PetBoardingCenter::findOrFail($boardingCenterId);
        
        $pets = Auth::user()->pets;

        return view('pet-owner.boardingcenter.booking', compact('boardingCenter', 'pets'));
    }

    //* Store the appointment details
    public function store(Request $request)
    {
        $request->validate([
            'boardingcenter_id' => 'required|exists:pet_boarding_centers,id',
            'pet_id' => 'required|exists:pets,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'check_in_time' => 'required|date_format:H:i',
            'check_out_time' => 'required|date_format:H:i',
            'total_price' => 'required|numeric|min:0',
            'special_notes' => 'nullable|string',
        ]);

        Appointment::create([
            'boardingcenter_id' => $request->boardingcenter_id,
            'petowner_id' => Auth::id(),
            'pet_id' => $request->pet_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'check_in_time' => $request->check_in_time,
            'check_out_time' => $request->check_out_time,
            'special_notes' => $request->special_notes,
            'status' => 'pending',
            'payment_status' => 'pending',
            'total_price' => $request->total_price,
        ]);

        return redirect()->route('pet-owner.dashboard')->with('success', 'Appointment created successfully!');
    }

    // Show all types of appointments: ongoing, past, accepted, pending, declined
    public function appointmentTypes()
    {
        $currentDate = now()->format('Y-m-d');
        $currentTime = now()->format('H:i:s');

        $ongoingAppointments = Appointment::where('petowner_id', Auth::id())
            ->where('status', 'accepted')
            ->where('end_date', '>=', $currentDate)
            ->with(['boardingcenter', 'pet'])
            ->get();

        $pastAppointments = Appointment::where('petowner_id', Auth::id())
            ->where('status', 'accepted')
            ->where('end_date', '<', $currentDate)
            ->with(['boardingcenter', 'pet'])
            ->get();

        $acceptedAppointments = Appointment::where('petowner_id', Auth::id())
            ->where('status', 'accepted')
            ->where('payment_status', 'pending')
            ->with(['boardingcenter', 'pet'])
            ->get();

        $pendingAppointments = Appointment::where('status', 'pending')
            ->where('petowner_id', Auth::id())
            ->with(['boardingcenter', 'pet'])
            ->get();

        $declinedAppointments = Appointment::where('status', 'declined')
            ->where('petowner_id', Auth::id())
            ->with(['boardingcenter', 'pet'])
            ->get();

        $pets = Auth::user()->pets;

        return view('pet-owner.dashboard', compact('acceptedAppointments', 'ongoingAppointments', 'pastAppointments', 'pets', 'pendingAppointments', 'declinedAppointments'));
    }

    public function removeDeclinedAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('pet-owner.dashboard')->with('success', 'Declined appointment removed successfully.');
    }

    //* Select payment method
    public function selectPaymentMethod(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|in:cash,card',
        ]);

        $appointment = Appointment::findOrFail($id);

        $appointment->update([
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_method == 'cash' ? 'onvisit' : 'paid',
        ]);

        return redirect()->route('pet-owner.dashboard')->with('success', 'Payment method selected successfully.');
    }

    //* Cash payment method for appointments
    public function cashPayment(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'payment_method' => 'cash',
            'payment_status' => 'onvisit',
        ]);

        return view('cash', compact('appointment'));
    }

    //* Show tasks for an appointment
    public function showTasks($id)
    {
        $appointment = Appointment::with('pet', 'boardingcenter')->findOrFail($id);
        $tasks = Task::all();
    
        return view('pet-boardingcenter.managetasks', compact('appointment', 'tasks'));
    }

    //* Show activity log for an appointment
    public function showActivityLog($appointmentId)
    {
        $appointment = Appointment::with(['pet', 'boardingcenter', 'taskCompletions.task'])->findOrFail($appointmentId);

        return view('pet-owner.activity-log', compact('appointment'));
    }

    //* Show task management list for a boarding center
    public function showManageTasksList()
    {
        $boardingCenterId = Auth::id();
        $ongoingAppointments = Appointment::where('boardingcenter_id', $boardingCenterId)
            ->where('status', 'accepted')
            ->whereDate('end_date', '>=', now())
            ->with(['pet', 'boardingcenter'])
            ->get();

        return view('pet-boardingcenter.managetaskslist', compact('ongoingAppointments'));
    }

    //* Show the checkout page for a specific appointment
    public function showCheckout($id)
    {
        $appointment = Appointment::with('boardingcenter', 'pet')
                                ->where('id', $id)
                                ->firstOrFail();

        return view('pet-owner.test', compact('appointment'));
    }
    // In AppointmentController.php

    public function showCashPaymentAppointments(Request $request)
    {
        // Calculate total revenue from paid appointments
        $totalRevenue = Appointment::where('payment_status', 'paid')->sum('total_price');

        // Fetch cash payment appointments that are still unpaid
        $query = Appointment::where('payment_method', 'cash')
                            ->where('payment_status', 'onvisit'); // Filter for pending cash payments

        // Apply search filters if available
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->whereHas('pet', function ($q) use ($searchTerm) {
                $q->where('pet_name', 'like', '%' . $searchTerm . '%');
            });
        }

        $cashAppointments = $query->with('pet', 'boardingcenter')->get();

        return view('pet-boardingcenter.cash-appointments', compact('cashAppointments', 'totalRevenue'));
    }

    //* Mark appointment as paid
    public function markAsPaid($id)
    {
        // Find the appointment
        $appointment = Appointment::findOrFail($id);

        // Update the payment status to 'paid'
        $appointment->update([
            'payment_status' => 'paid'
        ]);

        // Redirect back with success message
        return redirect()->route('boarding-center.cash-appointments')
                         ->with('success', 'Appointment marked as paid and added to the revenue.');
    }
}