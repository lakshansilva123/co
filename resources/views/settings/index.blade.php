<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <a href="{{ route('settings.pricing-tax.index') }}" class="bg-gray-700 p-6 rounded-lg shadow-md hover:bg-gray-600 transition duration-300 ease-in-out">
                            <h3 class="text-lg font-semibold text-white">Pricing & Tax Rules</h3>
                            <p class="text-gray-400 mt-2">Set your pricing and tax rules.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
