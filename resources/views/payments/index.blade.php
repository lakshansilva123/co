@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Payments for Booking #{{ $booking->id }}</h1>

        <a href="{{ route('bookings.payments.create', $booking) }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Payment</a>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Amount</th>
                    <th class="py-2 px-4 border-b">Payment Date</th>
                    <th class="py-2 px-4 border-b">Payment Method</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $payment->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $payment->amount }}</td>
                        <td class="py-2 px-4 border-b">{{ $payment->payment_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $payment->payment_method }}</td>
                        <td class="py-2 px-4 border-b">{{ $payment->status }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('payments.show', $payment) }}" class="text-blue-500">View</a>
                            <a href="{{ route('payments.edit', $payment) }}" class="text-green-500 ml-2">Edit</a>
                            <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
