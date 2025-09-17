<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Garment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Quick Stats
        $totalBookings = Booking::count();
        $totalCustomers = Customer::count();
        $totalGarments = Garment::count();
        $rentedOutCount = Garment::where('status', 'Rented out')->count();
        $awaitingCleaningCount = Garment::where('status', 'Awaiting cleaning')->count();
        $revenueForMonth = Payment::whereMonth('created_at', Carbon::now()->month)->sum('amount');

        // Today's Pickups
        $todaysPickups = Booking::with(['customer', 'garment'])
            ->whereDate('pickup_date', Carbon::today())
            ->get();

        // Upcoming Returns
        $upcomingReturns = Booking::with(['customer', 'garment'])
            ->whereBetween('return_date', [Carbon::now(), Carbon::now()->addHours(48)])
            ->get();

        // Overdue Rentals
        $overdueRentals = Booking::with(['customer', 'garment'])
            ->where('return_date', '<', Carbon::now())
            ->whereDoesntHave('returns')
            ->get();

        // New Booking Activity
        $newBookingActivity = Booking::with(['customer', 'garment'])->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalBookings',
            'totalCustomers',
            'totalGarments',
            'rentedOutCount',
            'awaitingCleaningCount',
            'revenueForMonth',
            'todaysPickups',
            'upcomingReturns',
            'overdueRentals',
            'newBookingActivity'
        ));
    }
}
