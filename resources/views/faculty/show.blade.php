@extends('teacher.layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Faculty Details</h2>

    <div class="mb-3">
        <strong>Name:</strong> {{ $faculty->name }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> {{ $faculty->description }}
    </div>

    <div class="mb-3">
        <strong>Status:</strong> {{ ucfirst($faculty->status) }}
    </div>

    <a href="{{ route('faculties.edit', $faculty) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('faculties.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection