@extends('layouts.app')

@section('content')
    <script>
        window.location = "{{ route('bookings.index') }}";
    </script>
@endsection
