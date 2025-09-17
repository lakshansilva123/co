<?php

namespace App\Http\Controllers;

use App\Models\Garment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class GarmentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Garment::select('garments.*');
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('garments.show', $row->id).'" class="text-indigo-600 hover:text-indigo-900">Show</a>';
                    $btn .= ' | <a href="'.route('garments.edit', $row->id).'" class="text-indigo-600 hover:text-indigo-900">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('garments.index');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('garments', 'public');
            $data['image_path'] = $path;
        }

        Garment::create($data);

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($garment->image_path) {
                Storage::disk('public')->delete($garment->image_path);
            }
            $path = $request->file('image')->store('garments', 'public');
            $data['image_path'] = $path;
        }

        $garment->update($data);

        return redirect()->route('garments.index')
                        ->with('success','Garment updated successfully');
    }

    public function destroy(Garment $garment)
    {
        if ($garment->image_path) {
            Storage::disk('public')->delete($garment->image_path);
        }

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
