<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Garment;
use App\Models\Customer;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $totalBookings = Booking::count();
        $totalCustomers = Customer::count();
        $totalGarments = Garment::count();
        $rentedGarments = Garment::where('status', 'rented out')->count();

        return view('reports.index', compact('totalBookings', 'totalCustomers', 'totalGarments', 'rentedGarments'));
    }
}
