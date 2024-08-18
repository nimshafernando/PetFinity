<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\PetBoardingCenter;
use App\Models\Task;
use Illuminate\Http\Request;
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
        ]);

        return redirect()->route('pet-owner.dashboard')->with('success', 'Appointment created successfully!');
    }

    //* Show accepted appointments from pet boarding center and ask for payment method 
    public function showAcceptedAppointments()
    {
        $acceptedAppointments = Appointment::where('petowner_id', Auth::id())
                                           ->where('status', 'accepted')
                                           ->where('payment_status', 'pending')
                                           ->with(['boardingcenter', 'pet'])
                                           ->get();

        return view('pet-owner.dashboard', compact('acceptedAppointments'));
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



    
    // Pet status update feature: Show tasks for an appointment
    public function showTasks($id)
    {
        $appointment = Appointment::with('pet', 'boardingcenter')->findOrFail($id);
        $tasks = Task::all();
    
        return view('pet-boardingcenter.managetasks', compact('appointment', 'tasks'));
    }

    // Show Activity Log
    public function showActivityLog($appointmentId)
    {
        $appointment = Appointment::with(['pet', 'boardingcenter', 'taskCompletions.task'])
            ->findOrFail($appointmentId);

        return view('pet-owner.activity-log', compact('appointment'));
    }

    // Pet status in the dashboard view (for pet owners)
    public function showOngoingAndPastAppointments()
    {
        $ongoingAppointments = Appointment::where('petowner_id', Auth::id())
            ->where('status', 'accepted')
            ->whereDate('end_date', '>=', now())
            ->with(['boardingcenter', 'pet'])
            ->get();

        $pastAppointments = Appointment::where('petowner_id', Auth::id())
            ->where('status', 'accepted')
            ->whereDate('end_date', '<', now())
            ->with(['boardingcenter', 'pet'])
            ->get();

        $acceptedAppointments = Appointment::where('petowner_id', Auth::id())
            ->where('status', 'accepted')
            ->with(['boardingcenter', 'pet'])
            ->get();

        return view('pet-owner.dashboard', compact('ongoingAppointments', 'pastAppointments', 'acceptedAppointments'));
    }


    public function showManageTasksList()
{
    $boardingCenterId = Auth::id(); // Get the authenticated boarding center's ID

    // Fetch all ongoing appointments for this boarding center
    $ongoingAppointments = Appointment::where('boardingcenter_id', $boardingCenterId)
        ->where('status', 'accepted')
        ->whereDate('end_date', '>=', now())
        ->with(['pet', 'boardingcenter'])
        ->get();

    return view('pet-boardingcenter.managetaskslist', compact('ongoingAppointments'));
}
   
}
