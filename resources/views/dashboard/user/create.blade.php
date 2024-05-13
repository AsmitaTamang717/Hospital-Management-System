@extends('dashboard.partials.app')
@section('content')
@section('title','User')
@section('title-link',route('user.index') )
@section('action','Create')
@inject('RoleHelper','App\Helpers\RoleHelper')
<div class="main-panel">
    <div class="content-wrapper">
      <h4 class="card-title">@include('dashboard.partials.breadcrumb')</h4>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                
                    {{ Form::open(['method' => 'post', 'class' => 'row g-3', 'route' => 'user.store']); }}
                    {{ Form::token(); }}
                    <div class="col-md-6">
                        {{ Form::label('name', 'User name', ['class' => 'form-label']) }}
                        {{ Form::text('username', old('username'), ['class' => 'form-control', 'id' => 'username']) }}
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                        {{ Form::text('email',null, ['class' => 'form-control', 'id' => 'email']) }}
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
                        {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'email']) }}
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        {{ Form::label('role', 'Role', ['class' => 'form-label']) }}
                        {{ Form::select('role_id',$RoleHelper->dropdown(), null, ['placeholder' => 'Select Role','class' => 'form-control form-select']); }}
                        @error('role_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row">
                          <div class="col-6">
                             {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                             <a href="{{ route('user.index')}}" class="btn btn-danger">
                              Cancel
                          </a> 
                          </div>
                        </div>
                      </div>
                    {{  Form::close(); }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection