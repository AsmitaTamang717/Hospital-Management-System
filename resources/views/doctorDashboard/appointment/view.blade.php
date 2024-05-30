@extends('dashboard.partials.app')
@section('title','Appointment')

@section('action','View')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title d-flex align-items-center">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-dns"></i>
          </span> 
          @include('doctorDashboard.partials.breadcrumb')
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <a href="{{ route('trashDoctor') }}" class="btn btn-outline-danger trash-btn">
                <i class="fa fa-trash pe-1" aria-hidden="true"></i>
                Trash
              </a>  
              <a href="{{ route('doctor.create')}}" class="btn btn-outline-primary modify-btn">
                <i class="mdi mdi-plus pe-1"></i>New
              </a>            
            </li>
          </ul>
        </nav>
      </div>

      
      <div class="row">
        <div class="col-12 grid-margin">
            <div class="card" >
                <div class="card-body">
                    @foreach($appointmentDetails as $appointment)
                    <h3>{{ $appointment->patient->fullname }}</h3>
                    <div class="row g-2">
                      <div class="col-lg-6">Age: {{ $appointment->patient->age }} </div>
                      <div class="col-lg-6">Gender: {{ $appointment->patient->gender }}</div>
                      <div class="col-lg-6">Permanent Address: {{ $appointment->patient->permanent_address }}</div>
                      @if($appointment->patient->temporary_address )
                      <div class="col-lg-6">Temporary Address: {{ $appointment->patient->temporary_address }}</div>
                      @endif
                      <div class="col-lg-6">Parent Name: {{ $appointment->patient->temporary_address }} </div>
                      <div class="col-lg-6">Phone: {{ $appointment->patient->phone }}</div>
                    </div>
                    @endforeach
                </div>
              </div> 
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
