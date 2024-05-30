@extends('dashboard.partials.app')
@section('title','Department')
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
              <a href="{{ route('trashDepartment') }}" class="btn btn-outline-danger trash-btn">
                <i class="fa fa-trash pe-1" aria-hidden="true"></i>
                Trash
              </a>  
              <a href="{{ route('department.create')}}" class="btn btn-outline-primary modify-btn">
                <i class="mdi mdi-plus pe-1"></i>New
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
                      <th> Department name </th>
                      <th> Department Code </th>
                      <th> Description </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $count=1
                    @endphp
                    @foreach($departments as $department)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->code }}</td>
                        <td>{!! strlen($department->description) > 20 ? substr($department->description, 0, 20) . '...' : $department->description !!}</td>
                        <td>
                          <a href="{{ route('department.show',$department->id) }}" class="edit-delete view"> <i class="bi bi-eye pe-2" title="view"></i> </a>
                          <a href="{{ route('department.edit',$department->id) }}" class="edit-delete edit"> <i class="fa fa-pencil-square-o" aria-hidden="true" title="edit"></i> </a>
                          {!! Form::open(['route' => ['department.destroy', $department->id], 'method' => 'DELETE', 'style' => 'display:inline;']) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true" title="delete"></i>
                            ', ['type' => 'submit', 'class' => 'edit-delete delete border-0', 'onclick' => "return confirm('Are you sure you want to delete this department?')"]) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $departments->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
