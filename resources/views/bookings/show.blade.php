@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Booking Details</h1>

        <div class="bg-white p-6 rounded shadow">
            <p class="mb-2"><strong>ID:</strong> {{ $booking->id }}</p>
            <p class="mb-2"><strong>Customer:</strong> {{ $booking->customer->name }}</p>
            <p class="mb-2"><strong>Garment:</strong> {{ $booking->garment->name }}</p>
            <p class="mb-2"><strong>Pickup Date:</strong> {{ $booking->pickup_date }}</p>
            <p class="mb-2"><strong>Return Date:</strong> {{ $booking->return_date }}</p>
            <p class="mb-2"><strong>Total Cost:</strong> {{ $booking->total_cost }}</p>
            <p class="mb-2"><strong>Status:</strong> {{ $booking->status }}</p>
        </div>

        <a href="{{ route('bookings.index') }}" class="text-blue-500 mt-4">Back to Bookings</a>
        <a href="{{ route('bookings.payments.index', $booking) }}" class="bg-green-500 text-white px-4 py-2 rounded mt-4 inline-block">View Payments</a>
        <a href="{{ route('bookings.send-confirmation', ['booking' => $booking, 'medium' => 'mail']) }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block">Send Email</a>
        <a href="{{ route('bookings.send-confirmation', ['booking' => $booking, 'medium' => 'vonage']) }}" class="bg-green-500 text-white px-4 py-2 rounded mt-4 inline-block">Send via WhatsApp</a>
    </div>
@endsection
