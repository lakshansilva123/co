<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-400">Active Rentals</h3>
                    <p class="text-4xl font-bold text-gray-800 dark:text-gray-200">{{ $rentedOutCount }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-400">Awaiting Cleaning</h3>
                    <p class="text-4xl font-bold text-gray-800 dark:text-gray-200">{{ $awaitingCleaningCount }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-400">Monthly Revenue</h3>
                    <p class="text-4xl font-bold text-gray-800 dark:text-gray-200">${{ number_format($revenueForMonth, 2) }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Today's Pickups -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Today's Pickups</h3>
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($todaysPickups as $booking)
                                <li class="py-3 flex justify-between items-center">
                                    <div>
                                        <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $booking->customer->name }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $booking->garment->name }}</p>
                                    </div>
                                    <span class="text-gray-500 dark:text-gray-400">{{ $booking->pickup_date->format('g:i A') }}</span>
                                </li>
                            @empty
                                <li class="py-3 text-gray-500 dark:text-gray-400">No pickups scheduled for today.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Upcoming Returns -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Upcoming Returns</h3>
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($upcomingReturns as $booking)
                                <li class="py-3 flex justify-between items-center">
                                    <div>
                                        <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $booking->customer->name }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $booking->garment->name }}</p>
                                    </div>
                                    <span class="text-gray-500 dark:text-gray-400">{{ $booking->return_date->diffForHumans() }}</span>
                                </li>
                            @empty
                                <li class="py-3 text-gray-500 dark:text-gray-400">No upcoming returns.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Overdue Rentals -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4 text-red-600 dark:text-red-400">Overdue Rentals</h3>
                    @if ($overdueRentals->count() > 0)
                        <div class="border-l-4 border-red-500 bg-red-50 dark:bg-red-900 p-4">
                            @foreach ($overdueRentals as $booking)
                                <p class="font-semibold text-red-800 dark:text-red-200">{{ $booking->customer->name }} - {{ $booking->garment->name }} <span class="text-red-600 dark:text-red-400"> - {{ $booking->return_date->diffForHumans() }} overdue</span></p>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">No overdue rentals.</p>
                    @endif
                </div>
            </div>

            <!-- New Booking Activity -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">New Booking Activity</h3>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($newBookingActivity as $booking)
                            <li class="py-3">New booking by <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $booking->customer->name }}</span> for a {{ $booking->garment->name }}</li>
                        @empty
                            <li class="py-3 text-gray-500 dark:text-gray-400">No new booking activity.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
