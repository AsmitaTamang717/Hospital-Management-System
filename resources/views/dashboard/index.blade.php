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
            <div class="row">
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-dark card-img-holder text-white">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Users</h4>
                    <h2 class="mb-5">7</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Departments</h4>
                    <h2 class="mb-5">7</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Doctors 
                    </h4>
                    <h2 class="mb-5">45</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Patients</h4>
                    <h2 class="mb-5">9</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>      <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
@endsection