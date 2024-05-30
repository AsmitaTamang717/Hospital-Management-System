@extends('doctorDashboard.partials.app')
@section('content')
@section('title','Appointment')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title d-flex align-items-center">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> @include('doctorDashboard.partials.breadcrumb')
        </h3>
       
      </div>
      @if(session('message'))
      <div class="alert alert-success session-message text-center position-relative"> 
        {{ session('message') }} 
        <i class="bi bi-x-circle position-absolute pe-2" style="top:5px; right:0px; font-size:18px; cursor:pointer" onclick="closeSession()"></i>
      </div>
      @endif
      
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col"> S.No. </th>
                      <th scope="col"> Name</th>
                      <th scope="col" >Age</th>
                      <th scope="col"> Gender </th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $count = 1;
                    @endphp
                   @foreach($appointmentDetails as $appointment)
                    <tr>
                      <td>{{ $count++ }}</td>
                      <td>{{ $appointment->patient->fullname }}</td>
                      <td>{{ $appointment->patient->age }}</td>
                      <td>{{ $appointment->patient->gender }}</td>
                     
                      <td>
                        <a href="{{ route('patientAppointment.show',$appointment->doc_id) }}" class="edit-delete view"> <i class="bi bi-eye pe-2" title="view"></i> </a>

                      </td>
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