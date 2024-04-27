{{-- resources/views/devices/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Devices</h1>
    <a href="{{ route('devices.create') }}" class="btn btn-success mb-3">Add New Device</a>
    
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Serial Number</th>
                <th>Inventory Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($devices as $device)
            <tr>
                <td>{{ $device->n_série }}</td>
                <td>{{ $device->n_inventaire }}</td>
                <td>
                    <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('devices.destroy', $device->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
