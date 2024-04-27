{{-- resources/views/classes/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Create New Class</h1>
    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Class Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="estalishment_id">Estalishment</label>
            <select class="form-control" id="estalishment_id" name="estalishment_id">
                @foreach ($estalishments as $estalishment)
                    <option value="{{ $estalishment->id }}">{{ $estalishment->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">create</button>
    </form>
</div>
@endsection
