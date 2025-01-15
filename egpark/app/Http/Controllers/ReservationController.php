<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Notification;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Facility; 

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->where('status', 'Pending')->get();
        
        $reservationHistory = History::where('user_id', Auth::id())->where('type', 'reservation')
                                     ->with('reservation') // Eager load related reservations
                                     ->get();

        $facilities = Facility::all();

        return view('user.reservation', [
            'reservations' => $reservations,
            'reservationHistory' => $reservationHistory,
            'facilities' => $facilities, // Pass the facilities to the view
        ]);
    }

    public function store(Request $request)
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

        // Create a notification for the user and admin
        Notification::create([
            'user_id' => Auth::id(),
            'type' => 'reservation',
            'item_id' => $reservation->id,
            'message' => 'Your reservation has been created successfully.',
            'admin_message' => 'A new reservation has been created by the user.',
            'is_read' => 0, // Default to unread for user
            'is_read_admin' => 0, // Default to unread for admin
        ]);

        // Log the creation in history
        $this->saveHistory($reservation, 'created');

        return redirect()->back()->with('success', 'Reservation created successfully!');
    }

    public function cancel(Reservation $reservation)
    {
        if ($reservation->status === 'Pending') {
            $reservation->status = 'Cancelled';
            $reservation->save();

            // Create a notification for the user and admin
            Notification::create([
                'user_id' => $reservation->user_id,
                'type' => 'reservation',
                'item_id' => $reservation->id,
                'message' => 'Your reservation has been cancelled successfully.',
                'admin_message' => 'Please note the cancellation of a reservation in your records.',
                'is_read' => 0, // Default to unread for user
                'is_read_admin' => 0, // Default to unread for admin
            ]);

            // Log the cancellation in history
            $this->saveHistory($reservation, 'cancelled');

            return redirect()->back()->with('success', 'Reservation has been cancelled successfully.');
        }

        return redirect()->back()->with('error', 'Unable to cancel this reservation.');
    }

    public function adminindex()
    {
        $reservations = Reservation::whereNotIn('status', ['Cancelled', 'Completed'])->get();
        return view('admin.reservation', compact('reservations'));
    }

    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $oldStatus = $reservation->status;
        $reservation->status = $request->input('status');
        $reservation->save();

        // Create a notification for the user and admin if the status has changed
        if ($oldStatus !== $reservation->status) {
            Notification::create([
                'user_id' => $reservation->user_id,
                'type' => 'reservation',
                'item_id' => $reservation->id,
                'message' => 'Your reservation status has been updated to ' . $reservation->status . '.',
                'admin_message' => 'The status of a reservation has been updated to ' . $reservation->status . '.',
                'is_read' => 0, // Default to unread for user
                'is_read_admin' => 0, // Default to unread for admin
            ]);

            // Log the status update in history
            $this->saveHistory($reservation, 'updated');
        }

        return redirect()->route('admin.reservation.index')->with('success', 'Reservation status updated successfully.');
    }

    private function saveHistory($reservation, $action)
    {
        History::create([
            'user_id' => $reservation->user_id,
            'type' => 'reservation',
            'item_id' => $reservation->id,
            'action' => $action,
        ]);
    }
    
}
