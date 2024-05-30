<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-item-doctor" >
        <a class="nav-link" href="{{ route('doctorDashboard.index') }}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      
      <li class="nav-item nav-item-doctor">
        <a class="nav-link" href="{{ route('profile') }}">
          <span class="menu-title">Profile</span>
          <i class="mdi mdi-doctor menu-icon"></i>
        </a>
      </li>
      <li class="nav-item nav-item-doctor">
        <a class="nav-link" href="{{ route('schedule.index') }}">
          <span class="menu-title">Schedules</span>
          <i class="mdi mdi-calendar menu-icon"></i>
        </a>
      </li>
      <li class="nav-item nav-item-doctor">
        <a class="nav-link" href="{{ route('patientAppointment.index') }}">
          <span class="menu-title">Appointment</span>
          <i class="bi bi-journals menu-icon"></i>
        </a>
      </li>
    </ul>
  </nav>
  