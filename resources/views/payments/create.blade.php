@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Add Payment for Booking #{{ $booking->id }}</h1>

        <form action="{{ route('bookings.payments.store', $booking) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="amount" class="block text-gray-700">Amount</label>
                <input type="text" name="amount" id="amount" class="w-full border-gray-300 rounded" value="{{ old('amount') }}">
                @error('amount')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="payment_date" class="block text-gray-700">Payment Date</label>
                <input type="date" name="payment_date" id="payment_date" class="w-full border-gray-300 rounded" value="{{ old('payment_date') }}">
                 @error('payment_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="payment_method" class="block text-gray-700">Payment Method</label>
                <input type="text" name="payment_method" id="payment_method" class="w-full border-gray-300 rounded" value="{{ old('payment_method') }}">
                 @error('payment_method')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded">
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Payment</button>
            <a href="{{ route('bookings.payments.index', $booking) }}" class="text-gray-500 ml-4">Cancel</a>
        </form>
    </div>
@endsection
