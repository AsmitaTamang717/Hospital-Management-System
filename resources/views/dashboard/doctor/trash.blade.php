@extends('dashboard.partials.app')
@section('title','Doctor')
@section('title-link',route('doctor.index'))
@section('action','Trash')
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
              <a href="" class="btn btn-outline-danger trash-btn">
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

      @if(session('message'))
      <div class="alert alert-success text-center session-message"> 
        <div class="message">{{ session('message') }} </div>
        <i class="bi bi-x close-session" onclick="closeSession()"></i>
      </div>
      @endif
      
     
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              @if($trashedDoctors->count() > 0)
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                        <th> S.No. </th>
                        <th> Doctor name </th>
                        <th>Specialization</th>
                        <th> Address </th>
                        <th> Phone </th>
                        <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trashedDoctors as $trashedDoctor)
                      <tr>
                        <td>{{ $trashedDoctor->id }}</td>
                        <td>{{ $trashedDoctor->first_name.' '.$trashedDoctor->middle_name.' '.$trashedDoctor->last_name }}</td>
                     
                        <td>{{$trashedDoctor->educations[0]->specialization }}</td>
                       
                        <td>{{ $trashedDoctor->district->district_name_eng }}</td>
                        <td>{{ $trashedDoctor->phone }}</td>
                        <td> 
                          <a href="{{ route('trashRestoreDoctor', $trashedDoctor->id) }}" class="edit-delete edit" onclick="return confirm('Are you sure you want to restore this department?');">
                            <i class="bi bi-arrow-counterclockwise" title="restore"></i> </a>
                          {!! Form::open(['route'=>['trashDeleteDoctor',$trashedDoctor->id],  'method' => 'DELETE', 'style' => 'display:inline;']) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true" title="delete"></i>
                            ', ['type' => 'submit', 'class' => 'edit-delete delete border-0', 'onclick' => "return confirm('Are you sure you want to delete this department permanently?')"]) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              
              @else
              <div class="empty-trash">
                <h4 class="text-center">There is no trash here!!</h4>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      



    </div>
  </div>
</div>
@endsection
