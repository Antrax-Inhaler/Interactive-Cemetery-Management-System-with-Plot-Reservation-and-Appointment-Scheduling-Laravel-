<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use App\Models\Appointment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch total population
        $totalPopulation = Plot::count();

        // Fetch total clients
        $totalClients = User::count();

        // Fetch total transactions (appointments + reservations)
        $totalTransactions = Appointment::count() + Reservation::count();

        // Fetch appointment and reservation requests
        $appointmentRequests = Appointment::where('status', 'Pending')->paginate(10);
        $reservationRequests = Reservation::where('status', 'Pending')->paginate(10);

        // Fetch gender distribution
        $genderDistribution = Plot::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get()
            ->keyBy('gender')
            ->map(function($item) {
                return $item->total;
            });

        // Fetch age distribution
        $ageDistribution = Plot::select(DB::raw('CASE 
                WHEN age BETWEEN 0 AND 9 THEN "Child (0-9)"
                WHEN age BETWEEN 10 AND 19 THEN "Teenager (10-19)"
                WHEN age BETWEEN 20 AND 59 THEN "Adult (20-59)"
                ELSE "Senior (60+)"
            END as age_group'), DB::raw('count(*) as total'))
            ->groupBy('age_group')
            ->get()
            ->keyBy('age_group')
            ->map(function($item) {
                return $item->total;
            });

        return view('admin.index', compact('totalPopulation', 'totalClients', 'totalTransactions', 'appointmentRequests', 'reservationRequests', 'genderDistribution', 'ageDistribution'));
    }
    public function analytics()
    {
        // Fetch gender distribution
        $genderDistribution = Plot::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();

        // Fetch age distribution
        $ageDistribution = Plot::select(DB::raw('CASE 
                WHEN age BETWEEN 0 AND 9 THEN "Child (0-9)"
                WHEN age BETWEEN 10 AND 19 THEN "Teenager (10-19)"
                WHEN age BETWEEN 20 AND 59 THEN "Adult (20-59)"
                ELSE "Senior (60+)"
            END as age_group'), DB::raw('count(*) as total'))
            ->groupBy('age_group')
            ->get();

        return view('admin.analytics', compact('genderDistribution', 'ageDistribution'));
    }
    public function analytics2()
    {
        // Fetch gender distribution
        $genderDistribution = Plot::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();

        // Fetch age distribution
        $ageDistribution = Plot::select(DB::raw('CASE 
                WHEN age BETWEEN 0 AND 9 THEN "Child (0-9)"
                WHEN age BETWEEN 10 AND 19 THEN "Teenager (10-19)"
                WHEN age BETWEEN 20 AND 59 THEN "Adult (20-59)"
                ELSE "Senior (60+)"
            END as age_group'), DB::raw('count(*) as total'))
            ->groupBy('age_group')
            ->get();

        return view('user.analytics', compact('genderDistribution', 'ageDistribution'));
    }

}
