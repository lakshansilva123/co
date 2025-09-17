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
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">General Settings</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage your application settings.</p>

                    <div class="mt-6">
                        <a href="{{ route('settings.pricing-tax') }}" class="text-blue-500 hover:underline">
                            Pricing & Tax
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
