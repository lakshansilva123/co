<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-center">
                                <h3 class="text-lg font-medium text-gray-900">Total Bookings</h3>
                                <p class="mt-1 text-3xl font-semibold text-gray-700">{{ $totalBookings }}</p>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-center">
                                <h3 class="text-lg font-medium text-gray-900">Total Customers</h3>
                                <p class="mt-1 text-3xl font-semibold text-gray-700">{{ $totalCustomers }}</p>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-center">
                                <h3 class="text-lg font-medium text-gray-900">Total Garments</h3>
                                <p class="mt-1 text-3xl font-semibold text-gray-700">{{ $totalGarments }}</p>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-center">
                                <h3 class="text-lg font-medium text-gray-900">Rented Garments</h3>
                                <p class="mt-1 text-3xl font-semibold text-gray-700">{{ $rentedGarments }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
