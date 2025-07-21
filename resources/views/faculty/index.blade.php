@extends('teacher.layouts.master')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Faculties</h2>
        <a href="{{ route('faculties.create') }}" class="btn btn-primary">Add Faculty</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faculties as $faculty)
                <tr>
                    <td>{{ $faculty->name }}</td>
                    <td>{{ $faculty->description }}</td>
                    <td>{{ ucfirst($faculty->status) }}</td>
                    <td>
                        <a href="{{ route('faculties.show', $faculty) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('faculties.edit', $faculty) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('faculties.destroy', $faculty) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection