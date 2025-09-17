<?php

namespace App\Http\Controllers;

use App\Models\GarmentReturn;
use App\Models\Booking;
use App\Models\Garment;
use Illuminate\Http\Request;

class GarmentReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returns = GarmentReturn::with('booking')->get();
        return view('returns.index', compact('returns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Booking $booking)
    {
        return view('returns.create', compact('booking'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Booking $booking)
    {
        $request->validate([
            'return_date' => 'required|date',
            'condition' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $return = $booking->garmentReturn()->create([
            'return_date' => $request->return_date,
            'condition' => $request->condition,
            'notes' => $request->notes,
        ]);

        $garment = $booking->garment;
        if ($request->condition === 'damaged') {
            $garment->status = 'requires repair';
        } else {
            $garment->status = 'awaiting cleaning';
        }
        $garment->save();

        return redirect()->route('returns.index')->with('success', 'Return recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GarmentReturn $return)
    {
        return view('returns.show', compact('return'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
