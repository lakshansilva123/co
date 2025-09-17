<?php

namespace App\Http\Controllers;

use App\Models\Garment;
use Illuminate\Http\Request;

class GarmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Garment::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('type', 'like', "%{$searchTerm}%")
                  ->orWhere('color', 'like', "%{$searchTerm}%");
        }

        $garments = $query->paginate(10);

        return view('garments.index', compact('garments'));
    }

    public function create()
    {
        return view('garments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'size' => 'required',
            'color' => 'required',
            'purchase_date' => 'required|date',
            'purchase_price' => 'required|numeric',
            'rental_price' => 'required|numeric',
        ]);

        Garment::create($request->all());

        return redirect()->route('garments.index')
                        ->with('success','Garment created successfully.');
    }

    public function show(Garment $garment)
    {
        return view('garments.show',compact('garment'));
    }

    public function edit(Garment $garment)
    {
        return view('garments.edit',compact('garment'));
    }

    public function update(Request $request, Garment $garment)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'size' => 'required',
            'color' => 'required',
            'purchase_date' => 'required|date',
            'purchase_price' => 'required|numeric',
            'rental_price' => 'required|numeric',
            'status' => 'required',
        ]);

        $garment->update($request->all());

        return redirect()->route('garments.index')
                        ->with('success','Garment updated successfully');
    }

    public function destroy(Garment $garment)
    {
        $garment->delete();

        return redirect()->route('garments.index')
                        ->with('success','Garment deleted successfully');
    }

    public function cleaning(Request $request) 
    {
        $query = Garment::where('status', 'awaiting cleaning');
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                      ->orWhere('type', 'like', "%{$searchTerm}%")
                      ->orWhere('color', 'like', "%{$searchTerm}%");
            });
        }

        $garments = $query->paginate(10);
        return view('garments.cleaning', compact('garments'));
    }

    public function repairs(Request $request)
    {
        $query = Garment::where('status', 'requires repair');
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                        ->orWhere('type', 'like', "%{$searchTerm}%")
                        ->orWhere('color', 'like', "%{$searchTerm}%");
            });
        }

        $garments = $query->paginate(10);
        return view('garments.repairs', compact('garments'));
    }
}
