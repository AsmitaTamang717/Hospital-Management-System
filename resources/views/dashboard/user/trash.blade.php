@extends('dashboard.partials.app')
@section('title','User')
@section('title-link',route('user.index'))
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
              <a href="{{ route('user.create')}}" class="btn btn-outline-primary modify-btn">
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
              @if($trashedUsers->count()>0)
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> S.No. </th>
                      <th> Username </th>
                      <th> Email </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trashedUsers as $trashedUser)
                      <tr>
                        <td>{{ $trashedUser->id }}</td>
                        <td>{{ $trashedUser->username }}</td>
                        <td>{{ $trashedUser->email }}</td>
                        <td> 
                          <a href="{{ route('trashRestoreUser', $trashedUser->id) }}" class="edit-delete edit" onclick="return confirm('Are you sure you want to restore this user?');">
                            <i class="bi bi-arrow-counterclockwise" title="restore"></i> </a>
                          {!! Form::open(['route' =>['trashDeleteUser',$trashedUser->id], 'method' => 'DELETE', 'style' => 'display:inline;']) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true" title="delete"></i>
                            ', ['type' => 'submit', 'class' => 'edit-delete delete border-0', 'onclick' => "return confirm('Are you sure you want to delete this user permanently?')"]) !!}
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
