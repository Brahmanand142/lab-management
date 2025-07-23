 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BIT Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home')}}" target='_blank'>
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Website</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.settings')}}"> 
                    <i class="fas fa-cogs"></i>
                    <span>Site Setting</span></a>
            </li>
             

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                      <a class="nav-link" href="{{ route('assign.register')}}"> 
                    <i class="fas fa-user-cog"></i>
                    <span>Registration</span></a>
            </li>
              <li class="nav-item">
                      <a class="nav-link" href="{{route('student.record')}}"> 
                  <i class="fa fa-user-graduate"></i>
                    <span>Students</span></a>
            </li>
             <li class="nav-item">
                      <a class="nav-link" href="{{route('backend.teacher.index')}}"> 
                 <i class="fa fa-chalkboard-teacher"></i>
                    <span>Teachers</span></a>
            </li>
            
<!-- for Faculty -->
         <li class="nav-item active">
                <a class="nav-link" href="{{ route('faculties.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Faculty</span></a>
            </li>
              <!-- for labs -->
         <!-- <li class="nav-item active">
                <a class="nav-link" href="{{ route('lab.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Labs Name</span></a>
            </li> -->
            
            
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>