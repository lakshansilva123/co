@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Return Details</h1>

        <div class="card">
            <div class="card-header">
                Return #{{ $return->id }}
            </div>
            <div class="card-body">
                <p><strong>Booking ID:</strong> {{ $return->booking_id }}</p>
                <p><strong>Return Date:</strong> {{ $return->return_date }}</p>
                <p><strong>Condition:</strong> {{ $return->condition }}</p>
                <p><strong>Notes:</strong> {{ $return->notes }}</p>
            </div>
        </div>

        <a href="{{ route('returns.index') }}" class="btn btn-primary mt-3">Back to All Returns</a>
    </div>
@endsection
