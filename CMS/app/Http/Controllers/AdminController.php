<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Ensure the admin routes are protected by middleware

    // Show the admin dashboard
    public function index()
    {
        // Return the admin view
        return view('admin.index');
    }

    // Add other admin-specific methods as needed
    public function showClients()
    {
        // Fetch all users
        $users = User::all();

        // Count the number of users
        $userCount = $users->count();

        // Pass the users and count to the view
        return view('admin.clients', compact('users', 'userCount'));
    }
}
