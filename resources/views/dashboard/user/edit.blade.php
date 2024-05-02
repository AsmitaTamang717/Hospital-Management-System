@extends('dashboard.partials.app')
@section('content')
@inject('RoleHelper','App\Helpers\RoleHelper')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit User</h4>
                
                {{ Form::open(['route' => ['user.update', $user->id], 'method' => 'post', 'class' => 'row g-3 mt-4']) }}
                @method('put')
                {{ Form::token() }}
                    <div class="col-md-6">
                        {{ Form::label('name', 'User name', ['class' => 'form-label']) }}
                        {{ Form::text('username',$user->username, ['class' => 'form-control', 'id' => 'username']) }}
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                        {{ Form::text('email',$user->email, ['class' => 'form-control', 'id' => 'email']) }}
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    

                    <div class="col-md-6">
                      {{ Form::label('role', 'Role', ['class' => 'form-label']) }}
                      {{ Form::select('role_id',$RoleHelper->dropdown(), $user->role_id, ['placeholder' => 'Select Role','class' => 'form-control form-select']); }}
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