<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">{{ $customer->name }}</h3>
                        <div>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p><strong>Email:</strong> {{ $customer->email }}</p>
                            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                        </div>
                        <div>
                            <p><strong>Measurements:</strong></p>
                            <ul>
                                <li><strong>Neck:</strong> {{ $customer->neck }}</li>
                                <li><strong>Chest:</strong> {{ $customer->chest }}</li>
                                <li><strong>Sleeve:</strong> {{ $customer->sleeve }}</li>
                                <li><strong>Waist:</strong> {{ $customer->waist }}</li>
                                <li><strong>Inseam:</strong> {{ $customer->inseam }}</li>
                                <li><strong>Shoe Size:</strong> {{ $customer->shoe_size }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
