 @extends('user.layouts.master')
@section('title','Dashboard')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


</head>
<body>
<div class="container mt-5 mb-5">
  <h2 class="text-center mb-4">Assignment Submission Form</h2>
  <form action="{{ route('assignments.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Student Information -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="studentName" class="form-label">Student Name</label>
        <input type="text" class="form-control" id="studentName" name="student_name" required>
      </div>
      <div class="col-md-6">
        <label for="studentId" class="form-label">Student ID</label>
        <input type="text" class="form-control" id="studentId" name="student_id" required>
      </div>
    </div>

    <!-- Assignment Info -->
       <label for="studentName" class="form-label">Assignment Title</label>
<input type="text" class="form-control" id="assignmentTitle" name="assignment_title" value="{{ old('assignment_title', $assignment_name ?? '') }}" required> 
 <label for="studentName" class="form-label">Subject Name</label>
<input type="text" class="form-control" id="subjectName" name="subject_name" value="{{ old('subject_name', $subject ?? '') }}" required>

 <label for="studentName" class="form-label">Lab Name</label> 
 <input type="text" class="form-control" id="labName" name="labname" value="{{ old('labname', $labname ?? '') }}">

 <label for="studentName" class="form-label">Teacher Name</label>
<input type="text" class="form-control" id="teacherName" name="teacher_name" value="{{ old('teacher_name', $teacher_name ?? '') }}"> 


    <!-- Due Date -->
    <div class="mb-3">
      <label for="dueDate" class="form-label">Due Date</label>
      <input type="date" class="form-control" id="dueDate" name="due_date" required>
    </div>

    <!-- File Upload -->
    <div class="mb-3">
      <label for="assignmentFiles" class="form-label">Upload Files (PDF or Images)</label>
      <input type="file" class="form-control" id="assignmentFiles" name="assignment_files[]" accept=".pdf, image/*" multiple required>
    </div>

    <!-- Comments -->
    <div class="mb-3">
      <label for="studentComments" class="form-label">Additional Comments / Notes</label>
      <textarea class="form-control" id="studentComments" name="comments" rows="3"></textarea>
    </div>

    <!-- Programming Area -->
    <div class="mb-4">
      <label class="form-label">Code Editor</label>
      <ul class="nav nav-tabs" id="codeTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="html-tab" data-bs-toggle="tab" data-bs-target="#html" type="button" role="tab">HTML</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="css-tab" data-bs-toggle="tab" data-bs-target="#css" type="button" role="tab">CSS</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="js-tab" data-bs-toggle="tab" data-bs-target="#js" type="button" role="tab">JavaScript</button>
        </li>
      </ul>
      <div class="tab-content mt-2">
        <div class="tab-pane fade show active" id="html" role="tabpanel">
          <textarea class="form-control code-area" name="html_code" placeholder="Write your HTML here..."></textarea>
        </div>
        <div class="tab-pane fade" id="css" role="tabpanel">
          <textarea class="form-control code-area" name="css_code" placeholder="Write your CSS here..."></textarea>
        </div>
        <div class="tab-pane fade" id="js" role="tabpanel">
          <textarea class="form-control code-area" name="js_code" placeholder="Write your JavaScript here..."></textarea>
        </div>
      </div>
    </div>

    <!-- Instructor Feedback Area -->
    <div class="mb-4">
      <h5>Instructor Feedback (For Teachers)</h5>
      <div class="mb-2">
        <label for="feedback" class="form-label">Feedback</label>
        <textarea class="form-control" id="feedback" name="feedback" rows="3" placeholder="Instructor's feedback..."></textarea>
      </div>
        <div class="col-md-6">
          <label class="form-label">Timestamp</label>
          <input type="text" class="form-control" value="<?= date('Y-m-d H:i:s'); ?>" readonly>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit Assignment</button>
  </form>
</div>
 </div>
</div>
@endsection