<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::select('customers.*');
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('customers.show', $row->id).'" class="text-indigo-600 hover:text-indigo-900">Show</a>';
                    $btn .= ' | <a href="'.route('customers.edit', $row->id).'" class="text-indigo-600 hover:text-indigo-900">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'nullable',
            'neck' => 'nullable',
            'chest' => 'nullable',
            'sleeve' => 'nullable',
            'waist' => 'nullable',
            'inseam' => 'nullable',
            'shoe_size' => 'nullable',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
                        ->with('success','Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$id,
            'phone' => 'nullable',
            'neck' => 'nullable',
            'chest' => 'nullable',
            'sleeve' => 'nullable',
            'waist' => 'nullable',
            'inseam' => 'nullable',
            'shoe_size' => 'nullable',
        ]);

        $customer = Customer::find($id);
        $customer->update($request->all());

        return redirect()->route('customers.index')
                        ->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully');
    }
}
