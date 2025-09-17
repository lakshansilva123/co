<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Returns') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="returns-table" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Customer
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Garment
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Return Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Condition
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#returns-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("returns.index") }}',
                columns: [
                    { data: 'customer', name: 'booking.customer.name' },
                    { data: 'garment', name: 'booking.garment.name' },
                    { data: 'return_date', name: 'return_date' },
                    { data: 'condition', name: 'condition' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
    @endpush
</x-app-layout>
