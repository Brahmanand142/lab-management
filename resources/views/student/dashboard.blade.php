@extends('student.layouts.master')
@section('title','Dashboard')
@section('content')

<style>
  h2 {
    text-align: center;
  }
  .container {
    max-width: 900px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  table, th, td {
    border: 1px solid #ccc;
  }
  th, td {
    padding: 10px;
    text-align: left;
  }
  th {
    background: #007bff;
    color: white;
  }
  .btn {
    padding: 8px 12px;
    margin: 5px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  .btn-submit {
    background-color: #28a745;
    color: white;
  }

  .status-badge {
    padding: 4px 8px;
    border-radius: 4px;
    color: white;
  }
  .pending { background-color: #ffc107; }
  .submitted { background-color: #17a2b8; }
  .completed { background-color: #28a745; }

</style>

<body>
<h2>Welcome, Student</h2>
<div class="container">
  <h2>Your Lab Assignments</h2>
  
  <table id="studentAssignmentTable">
    <thead>
      <tr>
        <th>Teacher</th>
        <th>Assignment</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="studentAssignmentBody">
      <!-- Will be populated dynamically -->
    </tbody>
  </table>
</div>

<script>
  
  function renderStudentTable() {
    const body = document.getElementById('studentAssignmentBody');
    body.innerHTML = '';
    studentAssignments.forEach((item, index) => {
      let badgeClass = '';
      if (item.status === 'Pending') badgeClass = 'pending';
      if (item.status === 'Submitted') badgeClass = 'submitted';
      if (item.status === 'Completed') badgeClass = 'completed';

      body.innerHTML += `
        <tr>
          <td>${item.teacher}</td>
          <td>${item.assignment}</td>
          <td><span class="status-badge ${badgeClass}">${item.status}</span></td>
          <td>
            ${item.status === 'Pending' ? `<button class="btn btn-submit" onclick="submitWork(${index})">Submit</button>` : '—'}
          </td>
        </tr>
      `;
    });
  }

  function submitWork(index) {
    if (confirm('Submit your work for this assignment?')) {
      studentAssignments[index].status = 'Submitted';
      renderStudentTable();
    }
  }

  renderStudentTable();
</script>

</body>
</html>
@endsection
