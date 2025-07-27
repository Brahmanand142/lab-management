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

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('teacher.profile')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
   

 

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        <!-- for labs -->
         <li class="nav-item active">
                <a class="nav-link" href="{{ route('lab.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Labs Name</span></a>
            </li>
            <!-- for assignments -->
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('assignment.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Assignment</span></a>
             <!-- for submitted assignments -->
              <!-- <li class="nav-item active">
                <a class="nav-link" href="{{ route('assignment.submit')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Submitted Assignment</span></a> -->
            </li>
                <li class="nav-item">
                      <a class="nav-link" href="{{route('teacher.student.index')}}"> 
                  <i class="fa fa-user-graduate"></i>
                    <span>Students</span></a> 

        </ul>
        
        <!-- Add this just before closing </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

