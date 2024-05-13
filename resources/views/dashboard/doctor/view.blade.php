@extends('dashboard.partials.app')
@section('title','Doctor')
@section('title-link',route('doctor.index'))
@section('action','View')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title d-flex align-items-center">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-dns"></i>
          </span> 
          @include('dashboard.partials.breadcrumb')
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
        <div class="col-4 grid-margin">
            <div class="card" style="width:18rem;">
                <img src="{{ asset($doctor->image_file) }}" class="card-img-top profile-pic" alt="profile" >
                <div class="card-body">
                  <h5 class="card-title">{{ $doctor->first_name.' '.$doctor->middle_name.' '.$doctor->last_name }}</h5>
                  <h5>License no: {{ $doctor->license_no }}</h5>
                  <h6>Specialization:</h6>
                  @foreach($doctor->educations as $education)
                  <p class="card-text mb-0">{{ $education->specialization }}</p>
                  @endforeach
                </div>
              </div> 
        </div>
        <div class="col-8 grid-margin">
            <div class="card">
                <div class="card-body">
                  <h5>Personal Details</h5>
                </div>
              </div> 
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
