@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Returns</h1>
        <a href="{{ route('bookings.index') }}" class="btn btn-primary">View Bookings</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Booking ID</th>
                    <th>Return Date</th>
                    <th>Condition</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($returns as $return)
                    <tr>
                        <td>{{ $return->id }}</td>
                        <td>{{ $return->booking_id }}</td>
                        <td>{{ $return->return_date }}</td>
                        <td>{{ $return->condition }}</td>
                        <td>
                            <a href="{{ route('returns.show', $return->id) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
