<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Booking $booking)
    {
        $payments = $booking->payments;
        return view('payments.index', compact('booking', 'payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Booking $booking)
    {
        return view('payments.create', compact('booking'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|string|in:completed,pending,failed',
        ]);

        $booking->payments()->create($validatedData);

        return redirect()->route('bookings.payments.index', $booking)
            ->with('success', 'Payment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|string|in:completed,pending,failed',
        ]);

        $payment->update($validatedData);

        return redirect()->route('bookings.payments.index', $payment->booking)
            ->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $booking = $payment->booking;
        $payment->delete();

        return redirect()->route('bookings.payments.index', $booking)
            ->with('success', 'Payment deleted successfully.');
    }
}
