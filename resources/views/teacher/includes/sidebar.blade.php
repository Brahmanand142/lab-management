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
                <a class="nav-link" href="{{ route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Sujects Name</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('home')}}" target='_blank'>
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Website</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.settings')}}"> 
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Site Setting</span></a>
            </li> -->
             

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                      <a class="nav-link" href=""> 
              
                    <span> Web Technology-1 Lab</span></a>
                    
            </li>

              <li class="nav-item">
                      <a class="nav-link" href=""> 
               
                    <span>Web Technology-2 Lab</span></a>
                    
            </li>
              <li class="nav-item">
                      <a class="nav-link" href=""> 
                    <span>MultiMedia Lab</span></a>
            </li>

            <li class="nav-item">
                      <a class="nav-link" href=""> 
                    <span>Java Lab</span></a>
            </li>
            <li class="nav-item">
                      <a class="nav-link" href=""> 
                    <span>DBMS Lab</span></a>
            </li>
            <li class="nav-item">
                      <a class="nav-link" href=""> 
                    <span>OS Lab</span></a>
            </li>
            <li class="nav-item">
                      <a class="nav-link" href=""> 
                    <span>IoT Lab</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>