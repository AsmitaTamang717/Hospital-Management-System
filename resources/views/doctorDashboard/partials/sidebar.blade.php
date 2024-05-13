<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        
        <li class="nav-item">
          <a class="nav-link " href="{{ route('doctor-dashboard.index') }}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="">
            <span class="menu-title">Profile</span>
            <i class="mdi mdi-doctor menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('schedule.index') }}">
            <span class="menu-title">Schedules</span>
            <i class="mdi mdi-calendar menu-icon"></i>
          </a>
        </li>
      </ul>
    </nav>