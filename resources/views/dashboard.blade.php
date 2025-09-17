<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Total Bookings</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalBookings }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Total Customers</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalCustomers }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Total Garments</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalGarments }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Rented Out</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $rentedOutCount }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Awaiting Cleaning</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $awaitingCleaningCount }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Revenue This Month</h3>
                    <p class="text-3xl font-bold text-gray-900">${{ number_format($revenueForMonth, 2) }}</p>
                </div>
            </div>

            <!-- Today's Pickups -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Today's Pickups</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Garment</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($todaysPickups as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->customer->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->garment->name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">No pickups scheduled for today.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Upcoming Returns -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Upcoming Returns (Next 48 Hours)</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Garment</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Return Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($upcomingReturns as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->customer->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->garment->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->return_date->format('Y-m-d') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">No upcoming returns.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Overdue Rentals -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Overdue Rentals</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Garment</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Return Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($overdueRentals as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->customer->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->garment->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-red-600">{{ $booking->return_date->format('Y-m-d') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">No overdue rentals.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- New Booking Activity -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">New Booking Activity</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Garment</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($newBookingActivity as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->customer->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->garment->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">No recent bookings.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
