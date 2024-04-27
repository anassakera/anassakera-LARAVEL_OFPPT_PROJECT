{{-- resources/views/todos/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>View Todo</h1>
    <div class="jumbotron">
        <h2>{{ $todo->title }}</h2>
        <p>{{ $todo->description }}</p>
        <a href="{{ route('todos.index') }}" class="btn btn-primary">Back to List</a>
    </div>
</div>
@endsection
