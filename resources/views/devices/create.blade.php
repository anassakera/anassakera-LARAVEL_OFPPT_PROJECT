{{-- resources/views/devices/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Add New Device</h1>
    
    <form action="{{ route('devices.store') }}" method="POST">
        @csrf
        {{-- Add form fields here --}}
        
        <button type="submit" class="btn btn-success">create</button>
    </form>
</div>
@endsection
