 @extends('backend.layouts.master')  

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Teachers List</h2>
        <a href="{{ route(' backend.table.teacher.create') }}" class="btn btn-primary">Add New Teacher</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Faculty</th>
                    <th>Lab</th>
                    <th>Assignment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->faculty }}</td>
                    <td>{{ $teacher->lab }}</td>
                    <td>{{ $teacher->assignment ?? 'N/A' }}</td> {{-- Display 'N/A' if assignment is null --}}
                    <td>
                        <a href="{{ route(' backend.table.teacher.edit', $teacher->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('backend.table.teacher.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this teacher?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No teachers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection