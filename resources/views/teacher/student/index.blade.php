 @extends('teacher.layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Students List</h2>
        <a href="{{ route('teacher.student.create') }}" class="btn btn-primary">Add New Student</a>
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
                    <th>Lab ID</th>
                    <th>Assignment ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
              <tbody>
              
                @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->faculty }}</td>
                    <td>{{ $student->lab_id }}</td>
                    <td>{{ $student->assignment_id }}</td>
                    <td>
                        <a href="{{ route('teacher.student.edit', $student->id) }}" class="btn btn-sm btn-info">Edit</a>
                        
                         <form action="{{ route('teacher.student.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                              @csrf
                                @method('DELETE')  
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">Delete</button>
</form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No students found.</td>
                </tr>
                @endforelse
            </tbody>
            
        </table>
    </div>
</div>
@endsection