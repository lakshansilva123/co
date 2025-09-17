@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Payment Details</h1>

        <div class="bg-white p-6 rounded shadow">
            <p class="mb-2"><strong>ID:</strong> {{ $payment->id }}</p>
            <p class="mb-2"><strong>Amount:</strong> {{ $payment->amount }}</p>
            <p class="mb-2"><strong>Payment Date:</strong> {{ $payment->payment_date }}</p>
            <p class="mb-2"><strong>Payment Method:</strong> {{ $payment->payment_method }}</p>
            <p class="mb-2"><strong>Status:</strong> {{ $payment->status }}</p>
            <p class="mb-2"><strong>Booking ID:</strong> {{ $payment->booking_id }}</p>
        </div>

        <a href="{{ route('bookings.payments.index', $payment->booking) }}" class="text-blue-500 mt-4">Back to Payments</a>
    </div>
@endsection
