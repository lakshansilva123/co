
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $garment->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300">Garment Details</h3>
                            <div class="mt-4">
                                <p><span class="font-semibold">Brand:</span> {{ $garment->brand }}</p>
                                <p><span class="font-semibold">Color:</span> {{ $garment->color }}</p>
                                <p><span class="font-semibold">Fit:</span> {{ $garment->fit }}</p>
                                <p><span class="font-semibold">Type:</span> {{ $garment->type }}</p>
                                <p><span class="font-semibold">Price:</span> ${{ $garment->price }}</p>
                                <p><span class="font-semibold">Security Deposit:</span> ${{ $garment->security_deposit }}</p>
                                <p><span class="font-semibold">Damage Waiver Fee:</span> ${{ $garment->damage_waiver_fee }}</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300">Images</h3>
                            <div class="mt-4">
                                <p>{{ $garment->images }}</p>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300">Notes</h3>
                            <div class="mt-4">
                                <p>{{ $garment->notes }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('garments.edit', $garment) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            {{ __('Edit') }}
                        </a>
                        <form action="{{ route('garments.destroy', $garment) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="submit" class="ml-4">
                                {{ __('Delete') }}
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
