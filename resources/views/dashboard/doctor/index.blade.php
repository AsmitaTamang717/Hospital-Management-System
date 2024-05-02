@extends('dashboard.partials.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-doctor menu-icon"></i>
          </span> Doctor
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <a href="" class="btn btn-outline-danger trash-btn">
                <i class="fa fa-trash pe-1" aria-hidden="true"></i>
                Trash
              </a> 
              <a href="{{ route('doctor.create') }}" class="btn btn-outline-primary modify-btn">
                <i class="mdi mdi-plus pe-1"></i>New
            </a>            
            </li>
          </ul>
        </nav>
      </div>

      @if(@session('message'))
      <div class="alert alert-success text-center"> {{ session('message') }} </div>
      @endif

      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> S.No. </th>
                      <th> Doctor name </th>
                      <th> Address </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                 
                      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection