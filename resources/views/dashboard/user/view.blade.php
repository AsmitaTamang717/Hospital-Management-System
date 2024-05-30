@extends('dashboard.partials.app')
@section('title','User')
@section('title-link',route('user.index'))
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
              <a href="{{ route('user.index') }}" class="btn bg-danger trash-btn text-light">
                <i class="bi bi-box-arrow-left pe-1"></i>
                Back
              </a>             
            </li>
          </ul>
        </nav>
      </div>
      
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card user-profile-card">
            <div class="card-body d-flex flex-column justify-content-center text-capitalize">
              <h3 class="user-name">User name: {{ $viewUser->username }}</h3>
              <span class="user-email">Email : {{ $viewUser->email }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
