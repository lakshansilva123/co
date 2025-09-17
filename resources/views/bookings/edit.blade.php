<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('bookings.update', $booking) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="customer_id" class="block font-medium text-sm text-gray-700">Customer</label>
                                <select name="customer_id" id="customer_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $booking->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="garment_id" class="block font-medium text-sm text-gray-700">Garment</label>
                                <select name="garment_id" id="garment_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($garments as $garment)
                                        <option value="{{ $garment->id }}" {{ $booking->garment_id == $garment->id ? 'selected' : '' }}>{{ $garment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="pickup_date" class="block font-medium text-sm text-gray-700">Pickup Date</label>
                                <input type="date" name="pickup_date" id="pickup_date" value="{{ $booking->pickup_date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="return_date" class="block font-medium text-sm text-gray-700">Return Date</label>
                                <input type="date" name="return_date" id="return_date" value="{{ $booking->return_date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="total_cost" class="block font-medium text-sm text-gray-700">Total Cost</label>
                                <input type="text" name="total_cost" id="total_cost" value="{{ $booking->total_cost }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                             <div>
                                <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                                <input type="text" name="status" id="status" value="{{ $booking->status }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <a href="{{ route('bookings.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Cancel</a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
