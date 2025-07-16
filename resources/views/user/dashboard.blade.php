@extends('user.layouts.master')
@section('title','Dashboard')
@section('content')


</head>
<body>
<div class="container mt-5 mb-5">
  <h2 class="text-center mb-4">Assignment Submission Form</h2>
  <form action="#" method="POST" enctype="multipart/form-data">
    
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
    <div class="row mb-3">
      <div class="col-md-4">
        <label for="subjectName" class="form-label">Subject Name</label>
        <input type="text" class="form-control" id="subjectName" name="subject_name" required>
      </div>
      <div class="col-md-4">
        <label for="labName" class="form-label">Lab Name</label>
        <input type="text" class="form-control" id="labName" name="lab_name">
      </div>
      <div class="col-md-4">
        <label for="assignmentTitle" class="form-label">Assignment Title</label>
        <input type="text" class="form-control" id="assignmentTitle" name="assignment_title" required>
      </div>
    </div>

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
      <div class="row">
        <div class="col-md-6">
          <label for="grade" class="form-label">Grade</label>
          <input type="text" class="form-control" id="grade" name="grade" placeholder="e.g. A+, B">
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

 

<body>

<div class="container mt-5 mb-5">
  <h2 class="text-center mb-4">Assignment Submission with Live Code</h2>

  <form>
    <div class="mb-3">
      <label for="studentName" class="form-label">Student Name</label>
      <input type="text" class="form-control" id="studentName" required>
    </div>

    <!-- Code Editor Tabs -->
    <ul class="nav nav-tabs" id="codeTab" role="tablist">
      <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#htmlEditor">HTML</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#cssEditor">CSS</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#jsEditor">JavaScript</button>
      </li>
    </ul>

    <div class="tab-content mt-3">
      <div class="tab-pane fade show active" id="htmlEditor">
        <textarea id="htmlCode" placeholder="Write HTML..."></textarea>
      </div>
      <div class="tab-pane fade" id="cssEditor">
        <textarea id="cssCode" placeholder="Write CSS..."></textarea>
      </div>
      <div class="tab-pane fade" id="jsEditor">
        <textarea id="jsCode" placeholder="Write JavaScript..."></textarea>
      </div>
    </div>

    <div class="mt-3">
      <button type="button" class="btn btn-success" onclick="updatePreview()">Run Code</button>
    </div>

    <div class="mt-3">
      <h5>Live Preview</h5>
      <iframe id="previewFrame"></iframe>
    </div>
  </form>
</div>





                   
                    
 

@endsection