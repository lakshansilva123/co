
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
                    <form action="{{ route('garments.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="brand" :value="__('Brand')" />
                                <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="old('brand')" required />
                                <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="color" :value="__('Color')" />
                                <x-text-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')" required />
                                <x-input-error :messages="$errors->get('color')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fit" :value="__('Fit')" />
                                <x-text-input id="fit" class="block mt-1 w-full" type="text" name="fit" :value="old('fit')" required />
                                <x-input-error :messages="$errors->get('fit')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="type" :value="__('Type')" />
                                <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required />
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="security_deposit" :value="__('Security Deposit')" />
                                <x-text-input id="security_deposit" class="block mt-1 w-full" type="number" name="security_deposit" :value="old('security_deposit')" required />
                                <x-input-error :messages="$errors->get('security_deposit')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="damage_waiver_fee" :value="__('Damage Waiver Fee')" />
                                <x-text-input id="damage_waiver_fee" class="block mt-1 w-full" type="number" name="damage_waiver_fee" :value="old('damage_waiver_fee')" required />
                                <x-input-error :messages="$errors->get('damage_waiver_fee')" class="mt-2" />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="images" :value="__('Images')" />
                                <x-textarea-input id="images" class="block mt-1 w-full" name="images">{{ old('images') }}</x-textarea-input>
                                <x-input-error :messages="$errors->get('images')" class="mt-2" />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="notes" :value="__('Notes')" />
                                <x-textarea-input id="notes" class="block mt-1 w-full" name="notes">{{ old('notes') }}</x-textarea-input>
                                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
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
