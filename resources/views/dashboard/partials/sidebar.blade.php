<div class="container-fluid page-body-wrapper">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link " href="{{ route('dashboard') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item {{ request()->routeIs('department.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('department.index') }}">
        <span class="menu-title">Departments</span>
        <i class="mdi mdi-dns menu-icon"></i>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('doctor.index') }}">
        <span class="menu-title">Doctors</span>
        <i class="mdi mdi-doctor menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href=" ">
        <span class="menu-title">Patients</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href=" {{ route('user.index') }}">
        <span class="menu-title">Users</span>
        <i class="mdi mdi-account-circle menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <span class="menu-title">Charts</span>
        <i class="mdi mdi-chart-bar menu-icon"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="../pages/charts/chartjs.html">ChartJs</a>
          </li>
        </ul>
      </div>
    </li>
   
  </ul>
</nav>