<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Garment;
use App\Notifications\BookingConfirmation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::with(['customer', 'garment'])->select('bookings.*');
            return DataTables::of($data)
                ->addColumn('customer', function(Booking $booking) {
                    return $booking->customer?->name;
                })
                ->addColumn('garment', function(Booking $booking) {
                    return $booking->garment?->name;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('bookings.show', $row->id).'" class="text-indigo-600 hover:text-indigo-900">Show</a>';
                    $btn .= ' | <a href="'.route('bookings.edit', $row->id).'" class="text-indigo-600 hover:text-indigo-900">Edit</a>';
                    if ($row->status !== 'returned') {
                        $btn .= ' | <a href="'.route('returns.create', $row->id).'" class="text-indigo-600 hover:text-indigo-900">Process Return</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('bookings.index');
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

        $booking->customer->notify(new BookingConfirmation($booking));

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

    public function sendConfirmation(Booking $booking, $medium)
    {
        $booking->customer->notify((new BookingConfirmation($booking))->via($medium));
        return redirect()->back()->with('success', 'Confirmation sent successfully!');
    }
}
