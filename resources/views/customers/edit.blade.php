<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Edit Customer</h3>
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $customer->name }}">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $customer->email }}">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $customer->phone }}">
                            </div>
                        </div>
                         <div class="mt-6">
                            <h3 class="text-lg font-semibold mb-4">Measurements</h3>
                             <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="neck" class="block text-sm font-medium text-gray-700">Neck</label>
                                    <input type="text" name="neck" id="neck" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $customer->neck }}">
                                </div>
                                <div>
                                    <label for="chest" class="block text-sm font-medium text-gray-700">Chest</label>
                                    <input type="text" name="chest" id="chest" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $customer->chest }}">
                                </div>
                                <div>
                                    <label for="sleeve" class="block text-sm font-medium text-gray-700">Sleeve</label>
                                    <input type="text" name="sleeve" id="sleeve" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $customer->sleeve }}">
                                </div>
                                <div>
                                    <label for="waist" class="block text-sm font-medium text-gray-700">Waist</label>
                                    <input type="text" name="waist" id="waist" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $customer->waist }}">
                                </div>
                                <div>
                                    <label for="inseam" class="block text-sm font-medium text-gray-700">Inseam</label>
                                    <input type="text" name="inseam" id="inseam" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $customer->inseam }}">
                                </div>
                                <div>
                                    <label for="shoe_size" class="block text-sm font-medium text-gray-700">Shoe Size</label>
                                    <input type="text" name="shoe_size" id="shoe_size" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $customer->shoe_size }}">
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Customer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
