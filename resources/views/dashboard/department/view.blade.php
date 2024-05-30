@extends('dashboard.partials.app')
@section('content')
@section('title','Department')
@section('title-link',route('department.index'))
@section('action','View')
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
              <a href="{{ route('department.index') }}" class="btn bg-danger trash-btn text-light">
                <i class="bi bi-box-arrow-left pe-1"></i>
                Back
              </a>             
            </li>
          </ul>
        </nav>
      </div>

      
      <div class="row">
        <div class="col-12 grid-margin">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Department Details</h4>
                </div>
                <div class="card-body">
                    <h5 class="mb-3">
                        <i class="mdi mdi-office-building pe-2"></i> Department Name: <span class="font-weight-bold">{{ $viewDepartment->name }}</span>
                    </h5>
                    <h6 class="mb-3">
                        <i class="mdi mdi-barcode-scan pe-2"></i> Code: <span class="font-weight-bold">{{ $viewDepartment->code }}</span>
                    </h6>
                    <div class="description mt-4">
                        <h6><i class="mdi mdi-information-outline pe-2"></i> Description:</h6>
                        <p class='mb-0'>{!! $viewDepartment->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    </div>
  </div>
</div>
@endsection
