<?php
namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Reservation;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch notifications
        $notifications = Notification::where('user_id', $user->id)
                                     ->orderBy('created_at', 'desc')
                                     ->get();

        return view('user.notification', compact('notifications'));
    }

    public function show($id)
    {
        // Find the notification
        $notification = Notification::findOrFail($id);

        // Fetch related data based on type
        $relatedData = null;
        switch ($notification->type) {
            case 'reservation':
                $relatedData = Reservation::find($notification->item_id);
                break;
            case 'appointment':
                $relatedData = Appointment::find($notification->item_id);
                break;
            case 'transaction':
                $relatedData = Transaction::find($notification->item_id);
                break;
        }

        return response()->json([
            'message' => $notification->message,
            $notification->type => $relatedData
        ]);
    }

    public function markAsRead($id)
    {
        // Mark notification as read
        $notification = Notification::findOrFail($id);
        $notification->is_read = 1; // Explicitly setting to 1 for read
        $notification->save();

        return response()->json(['success' => true]);
    }

    public function getUnreadCount()
    {
        $user = Auth::user();

        // Count unread notifications
        $unreadCount = Notification::where('user_id', $user->id)
                                   ->where('is_read', 0)
                                   ->count();

        // Return the total count as a JSON response
        return response()->json(['unreadCount' => $unreadCount]);
    }
    public function markAsReadAdmin($id)
{
    // Mark notification as read for admin
    $notification = Notification::findOrFail($id);
    $notification->is_read_admin = 1; // Set to 1 for read
    $notification->save();

    return response()->json(['success' => true]);
}

}
