 @extends('teacher.layouts.master')
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
    .btn-add {
      background-color: #28a745;
      color: white;
    }
    .btn-edit {
      background-color: #ffc107;
      color: black;
    }
    .btn-delete {
      background-color: #dc3545;
      color: white;
    }

    /* Modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
    }
    .modal-content {
      background: white;
      margin: 10% auto;
      padding: 20px;
      width: 90%;
      max-width: 500px;
      border-radius: 8px;
      position: relative;
    }
    .modal-close {
      position: absolute;
      top: 10px; right: 15px;
      font-size: 20px;
      cursor: pointer;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
  </style>
 
<body>
<h2>Teacher dashboard</h2>
<div class="container">
  <h2>Lab Assignments</h2>
  <button class="btn btn-add" onclick="openModal()">+ Add Assignment</button>
  
  <table id="assignmentTable">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Teacher</th>
        <th>Assignment</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="assignmentBody">
      <!-- Dynamically filled -->
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal" id="formModal">
  <div class="modal-content">
    <span class="modal-close" onclick="closeModal()">&times;</span>
    <h3 id="modalTitle">Add Assignment</h3>
    <form id="assignmentForm">
      <input type="hidden" id="editIndex">
      <label>Student Name</label>
      <input type="text" id="student" required>
      <label>Teacher</label>
      <input type="text" id="teacher" required>
      <label>Assignment</label>
      <input type="text" id="assignment" required>
      <label>Status</label>
      <select id="status">
        <option value="Pending">Pending</option>
        <option value="Submitted">Submitted</option>
        <option value="Completed">Completed</option>
      </select>
      <button class="btn btn-add" type="submit">Save</button>
    </form>
  </div>
</div>

<script>
  let assignments = [];

  function openModal(index = null) {
    document.getElementById('formModal').style.display = 'block';
    document.getElementById('assignmentForm').reset();
    document.getElementById('editIndex').value = index !== null ? index : '';
    
    if (index !== null) {
      const data = assignments[index];
      document.getElementById('student').value = data.student;
      document.getElementById('teacher').value = data.teacher;
      document.getElementById('assignment').value = data.assignment;
      document.getElementById('status').value = data.status;
      document.getElementById('modalTitle').textContent = 'Edit Assignment';
    } else {
      document.getElementById('modalTitle').textContent = 'Add Assignment';
    }
  }

  function closeModal() {
    document.getElementById('formModal').style.display = 'none';
  }

  function renderTable() {
    const body = document.getElementById('assignmentBody');
    body.innerHTML = '';
    assignments.forEach((item, index) => {
      body.innerHTML += `
        <tr>
          <td>${item.student}</td>
          <td>${item.teacher}</td>
          <td>${item.assignment}</td>
          <td>${item.status}</td>
          <td>
            <button class="btn btn-edit" onclick="openModal(${index})">Edit</button>
            <button class="btn btn-delete" onclick="deleteAssignment(${index})">Delete</button>
          </td>
        </tr>
      `;
    });
  }

  function deleteAssignment(index) {
    if (confirm('Are you sure you want to delete this assignment?')) {
      assignments.splice(index, 1);
      renderTable();
    }
  }

  document.getElementById('assignmentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const index = document.getElementById('editIndex').value;
    const assignmentData = {
      student: document.getElementById('student').value,
      teacher: document.getElementById('teacher').value,
      assignment: document.getElementById('assignment').value,
      status: document.getElementById('status').value
    };

    if (index === '') {
      assignments.push(assignmentData);
    } else {
      assignments[index] = assignmentData;
    }

    closeModal();
    renderTable();
  });

  renderTable();
</script>

</body>
</html>
@endsection