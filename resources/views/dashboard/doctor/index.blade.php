@extends('dashboard.partials.app')
@section('content')
@section('title','Doctor')
@inject('DepartmentHelper','App\Helpers\DepartmentHelper')
@inject('SpecializationHelper','App\Helpers\SpecializationHelper')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title d-flex">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-doctor menu-icon"></i>
          </span> @include('dashboard.partials.breadcrumb')
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <a href="{{ route('trashDoctor') }}" class="btn btn-outline-danger trash-btn">
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

      @if(session('message'))
      <div class="alert alert-success session-message text-center position-relative"> 
        {{ session('message') }} 
        <i class="bi bi-x-circle position-absolute pe-2" style="top:5px; right:0px; font-size:18px; cursor:pointer" onclick="closeSession()"></i>
      </div>
      @endif

{{-- search  --}}
      <nav class="navbar bg-transparent mb-2">
        <div class="container-fluid ps-0">
          <form class="d-flex w-100"  method="post" action="{{ route('searchFilter') }}">
            @csrf
            {{ Form::select('dep_id',$DepartmentHelper->dropdown(), null,[
              'class' => 'form-control  form-select py-2 me-2 px-4',
              'placeholder' => 'Select by Department'
              ] ); }}
            {{ Form::select('specialization',$SpecializationHelper->dropdown(), null,[
              'class' => 'form-control  form-select py-2 me-2 px-4',
              'placeholder' => 'Select by Specialization'
              ] ); }}           
            <input class="form-control me-2" name="randomSearch"  type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary me-1" type="submit">Search</button>
            <button class="btn btn-danger"><i class="bi bi-arrow-clockwise"></i></button>
          </form>
        </div>
      </nav>
      

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
                      <th>Specialization</th>
                      <th> Address </th>
                      <th> Phone </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $count=1
                    @endphp
                    @foreach($doctors as $doctor)
                    <tr>
                      <td>{{ $count++ }}</td>
                      <td>{{ $doctor->first_name.' '.$doctor->middle_name.' '.$doctor->last_name }}</td>
                   
                      <td>{{$doctor->educations[0]->specialization }}</td>
                     
                      <td>{{ $doctor->district->district_name_eng }}</td>
                      <td>{{ $doctor->phone }}</td>
                      <td>
                        <a href="{{ route('doctor.show',$doctor->id) }}" class="edit-delete view"> <i class="bi bi-eye pe-2" title="view"></i> </a>
                        <a href="{{ route('doctor.edit',$doctor->id) }}" class="edit-delete edit"> <i class="fa fa-pencil-square-o" aria-hidden="true" title="edit"></i> </a>
                        {!! Form::open(['route' => ['doctor.destroy', $doctor->id], 'method' => 'DELETE', 'style' => 'display:inline;']) !!}
                          {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true" title="delete"></i>
                          ', ['type' => 'submit', 'class' => 'edit-delete delete border-0', 'onclick' => "return confirm('Are you sure you want to delete this department?')"]) !!}
                        {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- @if(isset($searchValues) && $searchValues->isEmpty())
                  <p>No results found.</p>
                @endif --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection