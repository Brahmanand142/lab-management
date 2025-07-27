  @extends('teacher.layouts.master')
@section('title', 'Submitted Assignments')
@section('content')

<style>
    /* Custom CSS for Submitted Assignments Page */
    .container.mt-5 {
        padding-top: 20px;
    }

    h2.mb-4 {
        color: #2c3e50; /* Darker heading color */
        border-bottom: 2px solid #3498db; /* Blue underline */
        padding-bottom: 10px;
        margin-bottom: 30px !important;
    }

    .table {
        background-color: #ffffff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
        overflow: hidden; /* Ensures rounded corners are applied */
    }

    .table thead th {
        background-color: #3498db; /* Professional blue for table header */
        color: #ffffff;
        font-weight: bold;
        vertical-align: middle;
        border-bottom: none; /* Remove default border */
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa; /* Light grey for even rows */
    }

    .table tbody tr:hover {
        background-color: #e9ecef; /* Hover effect for rows */
    }

    .table td, .table th {
        padding: 12px 15px; /* Ample padding for cells */
        vertical-align: top; /* Align content to top for better multi-line display */
        border-top: 1px solid #dee2e6;
    }

    .table tbody tr:first-child td {
        border-top: none; /* Remove top border for the first row's cells */
    }

    /* Styling for assignment files list */
    .table ul {
        padding-left: 20px;
        margin-bottom: 0;
    }

    .table ul li {
        margin-bottom: 5px;
    }

    .table ul li a {
        color: #007bff; /* Bootstrap primary blue for links */
        text-decoration: none;
    }

    .table ul li a:hover {
        text-decoration: underline;
    }

    /* Preformatted text for code snippets */
    .table pre {
        background-color: #e9ecef;
        padding: 8px;
        border-radius: 4px;
        white-space: pre-wrap; /* Wrap long lines */
        word-break: break-all; /* Break words if necessary */
        font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, Courier, monospace;
        font-size: 0.875em; /* Slightly smaller font for code */
        margin-bottom: 5px; /* Space between different code types */
        max-height: 150px; /* Limit height of code blocks */
        overflow-y: auto; /* Add scroll for overflowing code */
        border: 1px solid #ced4da;
    }

    .table strong {
        color: #555;
    }

    /* Alert messages */
    .alert {
        margin-bottom: 20px;
        border-radius: 5px;
        font-size: 0.95em;
    }

    /* No assignments message */
    .table .text-center {
        color: #6c757d; /* Muted color for empty state */
        padding: 20px;
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">Submitted Assignments</h2>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Assignment Title</th>
                    <th>Subject</th>
                    <th>Lab Name</th>
                    <th>Teacher Name</th>
                    <th>Due Date</th>
                    <th>Assignment Files</th>
                    <th>Comments</th>
                    <th>Code Snippets</th>
                    <th>Feedback</th>
                    <th>Feedback Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @forelse($assignmentSubmits as $assignment)
               
                @empty
                <tr>
                    <td colspan="13" class="text-center py-4">
                        <p class="lead">No assignments submitted yet.</p>
                        <i class="bi bi-info-circle text-muted" style="font-size: 1.5rem;"></i>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection