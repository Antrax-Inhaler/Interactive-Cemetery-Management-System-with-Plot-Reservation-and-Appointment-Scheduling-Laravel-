<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Notification;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::id())->where('status', 'Pending')->get();
        $history = History::where('user_id', Auth::id())->where('type', 'appointment')
                           ->with('appointment') // Eager load related appointments
                           ->get();
    
        return view('user.appointment', compact('appointments', 'history'));
    }
    

public function store(Request $request)
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
            'admin_message' => 'A new appointment has been created by the user.',
            'is_read' => 0, // Default to unread
            'is_read_admin' => 0, // Default to unread for admin
        ]);

        // Log the creation in history
        $this->saveHistory($appointment, 'created');

        // Redirect to the user.appointment view with success message
        return redirect()->route('user.appointment')->with('success', 'Appointment created successfully!');
    }

    public function cancel(Appointment $appointment)
    {
        if ($appointment->status === 'Pending') {
            $appointment->status = 'Cancelled';
            $appointment->save();

            // Create a notification for the user
            Notification::create([
                'user_id' => $appointment->user_id,
                'type' => 'appointment',
                'item_id' => $appointment->id,
                'message' => 'Your appointment has been cancelled successfully.',
                'admin_message' => 'Please note the cancellation in your records.',
                'is_read' => 0, // Default to unread
                'is_read_admin' => 0, // Default to unread for admin
            ]);
            

            // Log the cancellation in history
            $this->saveHistory($appointment, 'cancelled');

            return redirect()->back()->with('success', 'Appointment cancelled successfully.');
        }

        return redirect()->back()->with('error', 'Unable to cancel this appointment.');
    }

    // Display appointments for admin
    public function adminIndex()
    {
        $appointments = Appointment::whereNotIn('status', ['Cancelled', 'Completed'])->get();
        return view('admin.appointment', compact('appointments'));
    }

    // Update appointment status
    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $oldStatus = $appointment->status;
        $appointment->status = $request->input('status');
        $appointment->save();

        // Create a notification for the user if the status has changed
        if ($oldStatus !== $appointment->status) {
            Notification::create([
                'user_id' => $appointment->user_id,
                'type' => 'appointment',
                'item_id' => $appointment->id,
                'message' => 'Your appointment status has been updated to ' . $appointment->status . '.',
                'admin_message' => 'The status of an appointment has been updated to ' . $appointment->status . '.',
                'is_read' => 0, // Default to unread
                'is_read_admin' => 0, // Default to unread for admin
            ]);

            // Log the status update in history
            $this->saveHistory($appointment, 'updated');
        }

        return redirect()->route('admin.appointment.index')->with('success', 'Appointment status updated successfully.');
    }

    private function saveHistory($appointment, $action)
    {
        History::create([
            'user_id' => $appointment->user_id,
            'type' => 'appointment',
            'item_id' => $appointment->id,
            'action' => $action,
        ]);
    }

    private function getHistory($userId)
    {
        return History::where('user_id', $userId)->where('type', 'appointment')->get();
    }
}
