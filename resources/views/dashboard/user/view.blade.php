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
              <a href="{{ route('trashUser') }}" class="btn btn-outline-danger trash-btn">
                <i class="fa fa-trash pe-1" aria-hidden="true"></i>
                Trash
              </a>  
              <a href="{{ route('user.create')}}" class="btn btn-outline-primary modify-btn">
                <i class="mdi mdi-plus pe-1"></i>New
              </a>            
            </li>
          </ul>
        </nav>
      </div>
      
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body d-flex flex-column justify-content-center text-capitalize">
              <h3>User name: {{ $viewUser->username }}</h3>
              <span>Email : {{ $viewUser->email }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
