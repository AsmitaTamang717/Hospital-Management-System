@extends('Dashboard.partials.app')
@section('content')
@section('title','Schedule')
@inject('DoctorHelper','App\Helpers\DoctorHelper')
@section('action','Create')
<div class="main-panel">
    <div class="content-wrapper">
      <h4 class="card-title">@include('dashboard.partials.breadcrumb')</h4>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                    {{ Form::open(['method' => 'post', 'class' => 'row g-3', 'route'=>'doctorSchedules.store']) }}
                    @csrf
                    <div class="col-md-6">
                      {{ Form::label('doctor', 'Doctor Name', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                      {{ Form::select('doc_id', $fullname, null, ['class' => 'form-control form-select', 'placeholder'=> 'select doctor']) }}
                      @error('doc_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('date', 'Date', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                        {{ Form::date('date',null, ['class' => 'form-control', 'id' => 'date']) }}
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        {{ Form::label('from', 'From', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                        {{ Form::time('from',null, ['class' => 'form-control', 'id' => 'from']) }}
                        @error('from')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        {{ Form::label('to', 'To', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                        {{ Form::time('to',null, ['class' => 'form-control', 'id' => 'to']) }}
                        @error('to')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                      {{ Form::label('days', 'Days', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                      {{ Form::select('days[]',config('days.dropdown'),null, ['class' => 'form-control js-example-basic-multiple form-select', 'id' => 'days','multiple' => 'multiple']) }}
                      @error('days')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-md-3">
                      {{ Form::label('availability', 'Availability', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                      {{ Form::select('availability',config('days.availability'),null, ['class' => 'form-control form-select']) }}
                      @error('availability')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-md-3">
                      {{ Form::label('total_quota', 'Total Quota', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                      {{ Form::text('total_quota',null, ['class' => 'form-control ']) }}
                      @error('total_quota')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>


                    <div class="col-12 mt-4">
                      <div class="row">
                        <div class="col-6">
                           {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                           <a href="" class="btn btn-danger">
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