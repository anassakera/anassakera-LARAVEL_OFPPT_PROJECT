{{-- resources/views/classes/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Class</h1>
    <form action="{{ route('classes.update', $classe) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Class Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $classe->name }}" required>
        </div>
        <div class="form-group">
            <label for="estalishment_id">Estalishment</label>
            <select class="form-control" id="estalishment_id" name="estalishment_id">
                @foreach ($estalishments as $estalishment)
                    <option value="{{ $estalishment->id }}" {{ $classe->estalishment_id == $estalishment->id ? 'selected' : '' }}>
                        {{ $estalishment->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
