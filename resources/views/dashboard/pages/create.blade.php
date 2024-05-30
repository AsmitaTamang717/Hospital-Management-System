@extends('dashboard.partials.app')
@section('content')
@section('title','Pages')
@section('title-link',route('pages.index') )
@section('action','Create')
<div class="main-panel">
    <div class="content-wrapper">
      <h4 class="card-title">@include('dashboard.partials.breadcrumb')</h4>
      <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                
                    {{ Form::open(['method' => 'post', 'class' => 'row g-3', 'route' => 'pages.store','enctype' => 'multipart/form-data']) }}
                    @csrf
                    <div class="col-md-6">
                        {{ Form::label('title_en', 'Title [English]', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                        {{ Form::text('title[en]',null, ['class' => 'form-control']) }}
                        @error('title.en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('title_np', 'Title [Nepali]', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                        {{ Form::text('title[np]',null, ['class' => 'form-control']) }}
                        @error('title.np')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 my-4">
                        {{ Form::label('image', 'Image', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span><br>
                        {{ Form::file('image',null, ['class' => 'form-control form-select']) }}
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    

                    <div class="col-12">
                        {{ Form::label('content_en', 'Content [English]', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                        {{ Form::textarea('content[en]',null, ['class' => 'form-control editor', 'placeholder' => 'Description']) }}
                        @error('content.en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        {{ Form::label('content', 'Content [Nepali]', ['class' => 'form-label']) }} <span class="text-danger pe-1">*</span>
                        {{ Form::textarea('content[np]',null, ['class' => 'form-control editor', 'placeholder' => 'Description']) }}
                        @error('content.np')
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