@extends('dashboard.partials.app')
@section('title', 'Doctor')
@section('title-link', route('doctor.index'))
@section('action', 'View')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title d-flex align-items-center">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-dns"></i>
                    </span>
                    @include('dashboard.partials.breadcrumb')
                </h3>
                <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                      <a href="{{ route('doctor.index') }}" class="btn bg-danger trash-btn text-light">
                        <i class="bi bi-box-arrow-left pe-1"></i>
                        Back
                      </a>             
                    </li>
                  </ul>
                </nav>
            </div>

            <div class="row">
                <div class="col-md-4 grid-margin">
                    <div class="card profile-card">
                      <img src="{{ $doctor->image_file ? asset($doctor->image_file) : asset('dashboard/assets/images/default-profile.jpg') }}" class="card-img-top profile-pic" alt="profile">
                      <div class="card-body">
                            <h5 class="card-title">{{ $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name }}
                            </h5>
                            <p class="card-text"><strong>License No:</strong> {{ $doctor->license_no }}</p>
                            <p class="card-text"><strong>Specialization:</strong></p>
                            @foreach ($doctor->educations as $education)
                                <p class="card-text mb-0">{{ $education->specialization }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-8 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Education</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($doctor->educations as $education)
                                    <li class="list-group-item">
                                        <strong>{{ $degree }}</strong> - {{ $education->institution }}
                                        ({{ $education->completion_year_bs }})
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Experience</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($doctor->experiences as $experience)
                                    <li class="list-group-item">
                                        <strong>{{ $experience->position }}</strong> at {{ $experience->organization }}
                                        ({{ $experience->start_date_bs }} - {{ $experience->end_date_bs }})
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
