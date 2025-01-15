<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Reservation;

class AdminCalendarController extends Controller
{
    public function index()
    {
        // Fetch all appointments where the status is not 'Cancelled'
        $appointments = Appointment::where('status', '!=', 'Cancelled')->get();

        // Fetch all reservations where the status is not 'Rejected'
        $reservations = Reservation::where('status', '!=', 'Rejected')->get();

        // Pass data to the view
        return view('admin.calendar', compact('appointments', 'reservations'));
    }
}
