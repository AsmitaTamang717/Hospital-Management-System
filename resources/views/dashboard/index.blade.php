@extends('dashboard.partials.app')
@section('content')
      
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row gx-4">
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-light card-img-holder">
                  <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="left-model">
                        <h4 class="font-weight-normal mb-3">Users</h4>
                        <h2 class="mb-5">{{ $userCount }}</h2>
                      </div>
                      <div class="card-right-icon bg-gradient-secondary">
                        <i class="mdi mdi-account-circle menu-icon"></i>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-light card-img-holder ">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="left-model">
                      <h4 class="font-weight-normal mb-3">Departments</h4>
                      <h2 class="mb-5">{{ $departmentCount }}</h2>
                    </div>
                    <div class="card-right-icon bg-gradient-danger">
                      <i class="mdi mdi-dns menu-icon"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-light card-img-holder">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="left-model">
                      <h4 class="font-weight-normal mb-3">Doctors</h4>
                      <h2 class="mb-5">{{ $doctorCount }}</h2>
                    </div>
                    <div class="card-right-icon bg-gradient-info">
                      <i class="mdi mdi-doctor menu-icon"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-lightcard-img-holder">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="left-model">
                      <h4 class="font-weight-normal mb-3">Patients</h4>
                      <h2 class="mb-5">{{ $patientCount }}</h2>
                    </div>
                    <div class="card-right-icon bg-gradient-success">
                      <i class="mdi mdi-account menu-icon"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>      <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
@endsection