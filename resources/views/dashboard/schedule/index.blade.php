@extends('dashboard.partials.app')
@section('content')
@section('title', 'Schedule')

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title d-flex align-items-center">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> @include('dashboard.partials.breadcrumb')
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ route('doctorSchedules.create') }}" class="btn btn-outline-primary modify-btn">
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
      @endsession
      
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
                    <th scope="col"> S.No. </th>
                    <th scope="col"> Doctor Name </th>
                    <th scope="col"> Date </th>
                    <th scope="col"> Day </th>
                    <th scope="col" class="col-4">Interval</th>
                    <th scope="col"> Action </th>
                  </tr>
                </thead>
                <tbody>
                  @php $count = 1; @endphp
                  @foreach($schedules as $schedule)
                  <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ optional($schedule->doctor)->first_name ?? 'N/A' }} {{ optional($schedule->doctor)->last_name ?? '' }}</td>
                    <td>{{ $schedule->date }}</td>
                    <td> {{ $schedule->days }}</td>
                    <td>{{ $schedule->from . ' - ' . $schedule->to}}</td>
                    <td>
                      <a href="" class="edit-delete view"> <i class="bi bi-eye pe-2" title="view"></i> </a>
                      <a href="{{ route('doctorSchedules.edit',$schedule->id) }}" class="edit-delete edit"> <i class="fa fa-pencil-square-o" aria-hidden="true" title="edit"></i> </a>
                      {!! Form::open(['route'=>['doctorSchedules.destroy',$schedule->id], 'method' => 'DELETE', 'style' => 'display:inline;']) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true" title="delete"></i>
                        ', ['type' => 'submit', 'class' => 'edit-delete delete border-0', 'onclick' => "return confirm('Are you sure you want to delete this schedule?')"]) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
               
                  @endforeach
                </tbody>
              </table>
            {{ $schedules->links() }}
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
