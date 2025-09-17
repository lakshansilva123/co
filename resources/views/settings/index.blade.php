<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('settings.update', $settings) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- App Name -->
                        <div>
                            <x-input-label for="app_name" :value="__('App Name')" />

                            <x-text-input id="app_name" class="block mt-1 w-full" type="text" name="app_name" :value="$settings->app_name" required autofocus />

                            <x-input-error :messages="$errors->get('app_name')" class="mt-2" />
                        </div>

                        <!-- Logo -->
                        <div class="mt-4">
                            <x-input-label for="logo" :value="__('Logo')" />

                            <input id="logo" class="block mt-1 w-full" type="file" name="logo" />

                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                            @if ($settings->logo_path)
                                <div class="mt-4">
                                    <img src="{{ asset('storage/' . $settings->logo_path) }}" alt="Logo" class="h-20">
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
