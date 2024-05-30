@extends('doctorDashboard.partials.app')
@section('content')
@section('title', 'Schedule')

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title d-flex align-items-center">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> @include('doctorDashboard.partials.breadcrumb')
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ route('schedule.create') }}" class="btn btn-outline-primary modify-btn">
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
      
    <!-- Other content here -->
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            @if(count($schedules) > 0)
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col-4"> S.No. </th>
                    <th scope="col-4"> Day </th>
                    <th scope="col-4"> Interval </th>
                    <th scope="col-4"> Status </th>
                   
                  </tr>
                </thead>
                <tbody>
                  @php $count = 1; @endphp

                  @foreach($schedules as $schedule)
                  <tr>
                    <td>{{ $count++ }}</td>

                    <td> {{ $schedule->days }}</td>
                    <td>{{ $schedule->from . ' - ' . $schedule->to}}</td>
                    <td>
                      <form action="{{ route('updateAvailability',  $schedule->id) }}" method="POST" id="availabilityForm">
                        @csrf
                        @method('PATCH')
                        <div class="form-check form-switch ps-4 ms-4">
                          <input type="hidden" name="availability" value="0">
                            <input type="checkbox" class="form-check-input" role="switch" name="availability"
                             id="flexSwitchCheckChecked" value=1 {{ $schedule->status ? 'checked' : '' }} onchange = "this.form.submit()">
                        </div>
                      </form>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            {{-- {{ $schedules->links() }} --}}
            </div>
            @else
            <div>There are no schedules</div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
