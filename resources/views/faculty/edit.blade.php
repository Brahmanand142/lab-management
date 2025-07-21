@extends('teacher.layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Edit Faculty</h2>

    <form method="POST" action="{{ route('faculties.update', $faculty) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $faculty->name) }}" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $faculty->description) }}</textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="active" {{ old('status', $faculty->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $faculty->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('faculties.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection