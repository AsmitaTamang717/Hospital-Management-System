@extends('dashboard.partials.app')
@section('content')
@section('title','Roles & Permissions')
@section('title-link',route('roles.index') )
@section('action','Create')
<div class="main-panel">
    <div class="content-wrapper">
      <h4 class="card-title">@include('dashboard.partials.breadcrumb')</h4>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                
                    {{ Form::open(['method' => 'post', 'class' => 'row g-3', 'route' => 'roles.store']) }}
                    @csrf
                    <div class="col-md-12">
                        {{ Form::label('name', 'Role name', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                        {{ Form::text('name',null, ['class' => 'form-control', 'id' => 'name']) }}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-12 mt-4">
                      <div class="row">
                        <div class="col-6">
                           {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                           <a href="{{ route('roles.index')}}" class="btn btn-danger">
                            Cancel
                        </a> 
                        </div>
                      </div>
                    </div>
                    {{  Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection