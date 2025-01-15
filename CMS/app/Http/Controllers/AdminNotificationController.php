<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Reservation;
use App\Models\Appointment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    public function index()
    {
        // Fetch all notifications, with the related user data
        $notifications = Notification::with('user')
                                     ->orderBy('created_at', 'desc')
                                     ->get();

        // Pass the notifications to the view
        return view('admin.notification', compact('notifications'));
    }

    public function show($id)
    {
        // Find the notification
        $notification = Notification::with('user')->findOrFail($id);

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
            'message' => $notification->admin_message,
            $notification->type => $relatedData
        ]);
    }

    public function markAsReadAdmin($id)
    {
        // Mark notification as read for admin
        $notification = Notification::findOrFail($id);
        $notification->is_read_admin = 1; // Set to 1 for read
        $notification->save();

        return response()->json(['success' => true]);
    }

    public function getUnreadNotificationCount()
    {
        $unreadCount = Notification::where('is_read_admin', 0)->count();
        return response()->json(['count' => $unreadCount]);
    }
}
