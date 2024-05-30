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
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                

                    {{ Form::open(['method' => 'post', 'class' => 'row g-3', 'route' => ['roles.update',$role->id] ]) }}
                    @csrf
                    @method('put')
                    <div class="col-md-12">
                        {{ Form::label('name', 'Role name', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                        {{ Form::text('name',$role->name, ['class' => 'form-control', 'id' => 'name']) }}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @foreach($permissions as $permission)
                    <div class="col-md-4 form-check d-flex align-items-center">
                        {{ Form::checkbox('permissions[]',$permission->name,in_array($permission->name, $rolePermissions), ['class' => 'form-control form-check-input me-2']) }}
                        {{ Form::label($permission->name, $permission->name),['class' => 'form-check-label'] }}
                        @error('permissions')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @endforeach
                    
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