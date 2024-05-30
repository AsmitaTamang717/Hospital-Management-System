@extends('dashboard.partials.app')
@section('content')
@section('title','Menu')
@section('title-link',route('menu.index') )
@section('action','Create')
@inject('MenuHelper','App\Helpers\MenuHelper')
@inject('ModuleHelper','App\Helpers\ModuleHelper')
@inject('PageHelper','App\Helpers\PageHelper')
<div class="main-panel">
    <div class="content-wrapper">
      <h4 class="card-title">@include('dashboard.partials.breadcrumb')</h4>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                
                    {{ Form::open(['method' => 'post', 'class' => 'row g-3', 'route' => 'menu.store']) }}
                    @csrf
                    <div class="col-md-4">
                        {{ Form::label('menu_name', 'Menu name [English]', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                        {{ Form::text('menu_name[en]',null, ['class' => 'form-control']) }}
                        @error('menu_name.en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        {{ Form::label('menu_name', 'Menu name [Nepali]', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                        {{ Form::text('menu_name[np]',null, ['class' => 'form-control']) }}
                        @error('menu_name.np')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                      {{ Form::label('menu_type', 'Menu Type', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                      {{ Form::select('menu_type_id',config('menu_type.dropdown'),null, [
                        'class' => 'form-control form-select',
                        'placeholder' => 'select menu type',
                        'onchange' => 'menuTypeChanged(this.value)'
                        ]) }} 
                      @error('menu_type')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    
                    <div class="col-md-4 d-none" id="module">
                      {{ Form::label('module', 'Module', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                      {{ Form::select('module_id',$ModuleHelper->dropdown(),null, [
                        'class' => 'form-control form-select ',
                        'placeholder' => 'select module',
                        ]) }} 
                      @error('module_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-4 d-none" id="page">
                      {{ Form::label('page', 'page', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                      {{ Form::select('page_id',$PageHelper->dropdown(),null, [
                        'class' => 'form-control form-select ',
                        'placeholder' => 'select pages'
                        ]) }} 
                      @error('page_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-4 d-none" id="external_link">
                      {{ Form::label('external_link', 'External Link', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                      {{ Form::url('external_link',null, ['class' => 'form-control ']) }}
                      @error('external_link')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-md-4">
                      {{ Form::label('display_order', 'Display Order', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                      {{ Form::text('display_order',null, ['class' => 'form-control']) }}
                      @error('display_order')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-md-4">
                      {{ Form::label('parent', 'Parent', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                      {{ Form::select('parent_id',$MenuHelper->dropdown(),null, ['class' => 'form-control form-select','placeholder'=>'select parent ']) }}
                      @error('parent')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-md-4">
                      {{ Form::label('status', 'Status') }} <span class="text-danger pe-1">*</span>
                      <div class="menu-status mt-2">
                        <div>
                          {{ Form::radio('status', 1, true) }} Active
                      </div>
                      <div class="mt-2">
                          {{ Form::radio('status', 0, false) }} Inactive
                      </div>
                      </div>
                      
                      @error('status')<span class="text-danger">{{ $message }}</span> @enderror
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