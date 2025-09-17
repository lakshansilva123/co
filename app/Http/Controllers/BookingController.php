<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Garment;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['customer', 'garment'])->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $garments = Garment::where('status', 'available')->get();
        return view('bookings.create', compact('customers', 'garments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'garment_id' => 'required|exists:garments,id',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'total_cost' => 'required|numeric',
        ]);

        $booking = Booking::create($request->all());

        $garment = $booking->garment;
        $garment->status = 'rented out';
        $garment->save();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $customers = Customer::all();
        $garments = Garment::where('status', 'available')->orWhere('id', $booking->garment_id)->get();
        return view('bookings.edit', compact('booking', 'customers', 'garments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'garment_id' => 'required|exists:garments,id',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'total_cost' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $originalGarment = $booking->garment;
        $originalGarment->status = 'available';
        $originalGarment->save();

        $booking->update($request->all());

        $newGarment = $booking->garment;
        $newGarment->status = 'rented out';
        $newGarment->save();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $garment = $booking->garment;
        $garment->status = 'available';
        $garment->save();
        
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
