@extends('dashboard.partials.app')
@section('title','Department')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title d-flex">
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
              <a href="{{ route('department.create')}}" class="btn btn-outline-primary modify-btn">
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
                      <th> Department name </th>
                      <th> Department Code </th>
                      <th> Description </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($departments as $department)
                      <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->code }}</td>
                        <td>{!! $department->description !!}</td>
                        <td> 
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
