{{-- resources/views/devices/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Device</h1>
    
    <form action="{{ route('devices.update', $device->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- Add form fields here --}}
        
        <button type="submit" class="btn btn-success">Update </button>
    </form>
</div>
@endsection
