 

@extends('teacher.layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Lab Details</h2>

    <div class="mb-3">
        <strong>Name:</strong> {{ $lab->name }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> {{ $lab->description }}
    </div>

    <div class="mb-3">
        <strong>Faculty:</strong> {{ $lab->faculty->name ?? 'N/A' }}
    </div>

    <div class="mb-3">
        <strong>Status:</strong> {{ ucfirst($lab->status) }}
    </div>

    <a href="{{ route('lab.edit', $lab) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('lab.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection