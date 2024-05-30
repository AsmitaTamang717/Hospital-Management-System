@extends('doctorDashboard.partials.app')
@section('content')
@section('title','Profile')
       
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title d-flex align-items-center">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> @include('doctorDashboard.partials.breadcrumb')
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('profileEdit') }}" class="btn btn-outline-primary modify-btn">
                      <i class="fa fa-pencil-square-o pe-1" aria-hidden="true"> </i> Edit Profile
                  </a>            
                  </li>
                </ul>
              </nav>
             
            </div>
            @if(session('message'))
            <div class="alert alert-success session-message text-center position-relative"> 
              {{ session('message') }} 
              <i class="bi bi-x-circle position-absolute pe-2" style="top:5px; right:0px; font-size:18px; cursor:pointer" onclick="closeSession()"></i>
            </div>
            @endsession
            
            <div class="row">
              <div class="col-7 grid-margin">
                <div class="card">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="{{ asset($doctor->image_file) }}" class="w-100 h-100" alt="profile">
                    <div class="profile-desc mt-2 text-center">
                      <h4 class="name">{{ $doctor->first_name.' '.$doctor->middle_name.' '.$doctor->last_name }}</h4>
                      <p>{{ $department->name }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-5 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Personal Information:</h4>
                    <hr>
                    <ul class="list-group">
                      <li class="list-group-item  border-0">First name: {{ $doctor->first_name }}</li>
                      @if($doctor->middle_name !== null)
                        <li class="list-group-item  border-0">Middle name: {{ $doctor->middle_name }}</li>
                      @endif
                      <li class="list-group-item  border-0">Last name: {{ $doctor->last_name }}</li>
                      <li class="list-group-item  border-0">Date of Birth(BS): {{ $doctor->dob_bs }}</li>
                      <li class="list-group-item  border-0">Date of Birth(AD): {{ $doctor->dob_ad }}</li>
                      <li class="list-group-item  border-0">Phone: {{ $doctor->phone }}</li>
                      <li class="list-group-item  border-0">Permanent District: {{ $permanentDistrict->district_name_eng }}</li>
                      {{-- <li class="list-group-item  border-0">Permanent Province: {{ $permanentProvince->english_name }}</li> --}}
                      @if(!empty($temporaryDistrict) && $temporaryDistrict->district_name_eng !== null)
                      <li class="list-group-item border-0">Temporary District: {{ $temporaryDistrict->district_name_eng }}</li>
                      @endif
                      <li class="list-group-item  border-0">License no: {{ $doctor->license_no }}</li>
                      <li class="list-group-item  border-0">Email: {{ $user->email }}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Education</h4>
                    <div class="table-responsive mt-4">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Degree</th>
                            <th>Specialization</th>
                            <th> Completion Year(BS)</th>
                            <th>  Completion Year(AD) </th>
                            <th>  Institution </th>
                            <th> Obtained Marks </th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($doctor->educations as $education)
                          <tr>
                            
                            <td>{{ $degree }}</td>
                         
                            <td>{{ $education->specialization }}</td>
                         
                            <td>{{ $education->completion_year_bs }}</td>
                           
                            <td>{{ $education->completion_year_ad }}</td>
                            <td>{{ $education->institution}}</td>
                            <td>{{ $education->obtained_marks }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Experience</h4>
                    <div class="table-responsive mt-4">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Organizaton</th>
                            <th>Position</th>
                            <th> Start Date(BS)</th>
                            <th> Start Date(AD) </th>
                            <th> End Date(BS)</th>
                            <th> End Date(AD)</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($doctor->experiences as $experience)
                          <tr>
                            <td>{{ $experience->organization }}</td>
                            <td>{{ $experience->position }}</td>
                            <td>{{ $experience->start_date_bs }}</td>
                            <td>{{ $experience->start_date_ad }}</td>
                            <td>{{ $experience->start_date_bs}}</td>
                            <td>{{ $experience->start_date_ad }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
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