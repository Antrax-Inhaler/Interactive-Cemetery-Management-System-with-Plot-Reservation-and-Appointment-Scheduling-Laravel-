<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        // Fetch all appointments for the authenticated user
        $appointments = Appointment::where('user_id', Auth::id())
                                   ->where('status', '!=', 'Cancelled')
                                   ->get();

        // Fetch all reservations for the authenticated user where the status is not 'Rejected'
        $reservations = Reservation::where('user_id', Auth::id())
                                   ->where('status', '!=', 'Rejected')
                                   ->get();

        // Pass data to the view
        return view('user.calendar2', compact('appointments', 'reservations'));
    }

    // Controller Method
    public function adminIndex()
    {
        // Fetch all appointments where the status is not 'Cancelled'
        $appointments = Appointment::where('status', '!=', 'Cancelled')->get();

        // Fetch all reservations where the status is not 'Rejected'
        $reservations = Reservation::where('status', '!=', 'Rejected')->get();

        return view('admin.calendar2', compact('appointments', 'reservations'));
    }

    public function storeAppointment(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'purpose' => 'required|string|max:255',
        ]);

        $appointment = new Appointment();
        $appointment->user_id = Auth::id();
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->purpose = $request->purpose;
        $appointment->status = 'Pending';
        $appointment->save();

        // Create a notification for the new appointment
        Notification::create([
            'user_id' => Auth::id(),
            'type' => 'appointment',
            'item_id' => $appointment->id,
            'message' => 'New appointment created.',
            'is_read' => 0, // Unread notification
        ]);

        return redirect()->route('calendar2.index')->with('success', 'Appointment created successfully.');
    }

    public function storeReservation(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'facilities' => 'required|array',
            'services' => 'required|array',
        ]);

        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->facilities = json_encode($request->facilities);
        $reservation->services = json_encode($request->services);
        $reservation->status = 'Pending';
        $reservation->save();

        // Create a notification for the new reservation
        Notification::create([
            'user_id' => Auth::id(),
            'type' => 'reservation',
            'item_id' => $reservation->id,
            'message' => 'New reservation created.',
            'is_read' => 0, // Unread notification
        ]);

        return redirect()->route('calendar2.index')->with('success', 'Reservation created successfully.');
    }
}
