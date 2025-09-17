
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Garment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('garments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="type" :value="__('Type')" />
                                <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required />
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="size" :value="__('Size')" />
                                <x-text-input id="size" class="block mt-1 w-full" type="text" name="size" :value="old('size')" required />
                                <x-input-error :messages="$errors->get('size')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="color" :value="__('Color')" />
                                <x-text-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')" required />
                                <x-input-error :messages="$errors->get('color')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="purchase_date" :value="__('Purchase Date')" />
                                <x-text-input id="purchase_date" class="block mt-1 w-full" type="date" name="purchase_date" :value="old('purchase_date')" required />
                                <x-input-error :messages="$errors->get('purchase_date')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="purchase_price" :value="__('Purchase Price')" />
                                <x-text-input id="purchase_price" class="block mt-1 w-full" type="number" name="purchase_price" :value="old('purchase_price')" required />
                                <x-input-error :messages="$errors->get('purchase_price')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="rental_price" :value="__('Rental Price')" />
                                <x-text-input id="rental_price" class="block mt-1 w-full" type="number" name="rental_price" :value="old('rental_price')" required />
                                <x-input-error :messages="$errors->get('rental_price')" class="mt-2" />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="image" :value="__('Image')" />
                                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Add Garment') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
