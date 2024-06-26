@extends('dashboard.partials.app')
@section('content')
@section('title','Department')
@section('title-link',route('department.index'))
@section('action','Edit')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <h4 class="card-title">@include('dashboard.partials.breadcrumb')</h4>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                {{-- <form class="row g-3 mt-4"> --}}
                    {{ Form::open(['method' => 'post', 'class' => 'row g-3', 'route' => ['department.update',$department->id]]); }}
                    @method('put')
                    {{ Form::token(); }}
                    <div class="col-md-6">
                        {{ Form::label('name', 'Department name', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                        {{ Form::text('name', $department->name, ['class' => 'form-control', 'id' => 'name']) }}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        {{ Form::label('code', 'Department code', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                        {{ Form::text('code',$department->code, ['class' => 'form-control', 'id' => 'code']) }}
                        @error('department-code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        {{ Form::label('description', 'Department description', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                        {{ Form::textarea('description', $department->description, ['class' => 'form-control editor', 'placeholder' => 'Description']) }}
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 mt-4">
                      <div class="row">
                        <div class="col-6">
                           {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                           <a href="{{ route('department.index')}}" class="btn btn-danger">
                            Cancel
                        </a> 
                        </div>
                      </div>
                    </div>
                    {{  Form::close(); }}
                  {{-- </form> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection