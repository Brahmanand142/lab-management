 @extends('backend.layouts.master')
@section('title','Dashboard')
@section('content')

    <table border='2'>
        <h1>Teacher List</h1>
    
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
            </tr>
        </thead>
        <tbody>
    <!-- @if(isset($teachers) && $teachers->isNotEmpty()) -->
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teachers->id }}</td>
                <td>{{ $teachers->t_name }}</td>
                <td>{{ $teachers->subject }}</td>
                {{-- Add other teacher fields as needed --}}
            </tr>
        @endforeach
    <!-- @else
        <tr>
            <td colspan="3">No teachers found.</td>
        </tr> -->
    @endif
</tbody>
    </table>

@endsection