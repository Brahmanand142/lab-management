<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hello, {{ auth()->check() ? auth()->user()->role : "" }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Subjects Dropdown -->
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#subjectsMenu" role="button" aria-expanded="false" aria-controls="subjectsMenu">
            📘 <span>Subjects</span>
        </a>
        <div class="collapse ps-3" id="subjectsMenu">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Web Technology-1 Lab</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Web Technology-2 Lab</a></li>
                <li class="nav-item"><a class="nav-link" href="#">MultiMedia Lab</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Java Lab</a></li>
                <li class="nav-item"><a class="nav-link" href="#">DBMS Lab</a></li>
                <li class="nav-item"><a class="nav-link" href="#">OS Lab</a></li>
                <li class="nav-item"><a class="nav-link" href="#">IoT Lab</a></li>
            </ul>
        </div>
    </li>

    
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

<!-- for Faculty -->
         <li class="nav-item active">
                <a class="nav-link" href="{{ route('faculties.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Faculty</span></a>
            </li>

        <!-- for labs -->
         <li class="nav-item active">
                <a class="nav-link" href="{{ route('lab.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Labs Name</span></a>

    <!-- Assignments (View) -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.assignments.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>View Assignments</span>
        </a>
    </li>

    <!-- Submit Assignment -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.assignments.index') }}">
            <i class="fas fa-fw fa-upload"></i>
            <span>Submit Assignment</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- Bootstrap JS for collapsible menu -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
