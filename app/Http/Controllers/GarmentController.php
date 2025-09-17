<?php

namespace App\Http\Controllers;

use App\Models\Garment;
use Illuminate\Http\Request;

class GarmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garments = Garment::all();
        return view('garments.index', compact('garments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('garments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'fit' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'security_deposit' => 'required|numeric',
            'damage_waiver_fee' => 'required|numeric',
            'images' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Garment::create($request->all());

        return redirect()->route('garments.index')
            ->with('success', 'Garment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Garment $garment)
    {
        return view('garments.show', compact('garment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garment $garment)
    {
        return view('garments.edit', compact('garment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garment $garment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'fit' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'security_deposit' => 'required|numeric',
            'damage_waiver_fee' => 'required|numeric',
            'images' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $garment->update($request->all());

        return redirect()->route('garments.index')
            ->with('success', 'Garment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garment $garment)
    {
        $garment->delete();

        return redirect()->route('garments.index')
            ->with('success', 'Garment deleted successfully.');
    }

    /**
     * Update the status of the specified resource in storage.
     */
    public function updateStatus(Request $request, Garment $garment)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', Garment::STATUSES),
        ]);

        $garment->update(['status' => $request->status]);

        return redirect()->route('garments.index')
            ->with('success', 'Garment status updated successfully.');
    }
}
