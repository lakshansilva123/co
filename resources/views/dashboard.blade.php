<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <!-- Quick Stats -->
                <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Active Rentals</h3>
                    <p class="text-2xl">{{ $rentedOutCount }}</p>
                </div>
                <div class="bg-green-500 text-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Suits Awaiting Cleaning</h3>
                    <p class="text-2xl">{{ $awaitingCleaningCount }}</p>
                </div>
                <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Revenue for the Month</h3>
                    <p class="text-2xl">${{ number_format($revenueForMonth, 2) }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Today's Pickups -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Today's Pickups</h3>
                        <ul class="divide-y divide-gray-200">
                            @forelse ($todaysPickups as $booking)
                                <li class="py-2 flex justify-between">
                                    <span>{{ $booking->customer->name }} - {{ $booking->garment->name }}</span>
                                    <span class="text-gray-500">{{ $booking->pickup_date->format('g:i A') }}</span>
                                </li>
                            @empty
                                <li class="py-2 text-gray-500">No pickups scheduled for today.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Upcoming Returns -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Upcoming Returns</h3>
                        <ul class="divide-y divide-gray-200">
                            @forelse ($upcomingReturns as $booking)
                                <li class="py-2 flex justify-between">
                                    <span>{{ $booking->customer->name }} - {{ $booking->garment->name }}</span>
                                    <span class="text-gray-500">{{ $booking->return_date->diffForHumans() }}</span>
                                </li>
                            @empty
                                <li class="py-2 text-gray-500">No upcoming returns.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Overdue Rentals</h3>
                    @if ($overdueRentals->count() > 0)
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                            <p class="font-bold">Urgent</p>
                            @foreach ($overdueRentals as $booking)
                                <p>{{ $booking->customer->name }} - {{ $booking->garment->name }} - {{ $booking->return_date->diffForHumans() }} overdue</p>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No overdue rentals.</p>
                    @endif
                </div>
            </div>

            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">New Booking Activity</h3>
                    <ul class="divide-y divide-gray-200">
                        @forelse ($newBookingActivity as $booking)
                            <li class="py-2">New booking by {{ $booking->customer->name }} for a {{ $booking->garment->name }}</li>
                        @empty
                            <li class="py-2 text-gray-500">No new booking activity.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
