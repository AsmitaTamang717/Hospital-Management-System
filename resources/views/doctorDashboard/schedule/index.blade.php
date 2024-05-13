@extends('doctorDashboard.partials.app')
@section('content')
       
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title d-flex align-items-center">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
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
            @endsession
            
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> S.No. </th>
                            <th> Date </th>
                            <th>From</th>
                            <th> To </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($schedules as $schedule)
                          @foreach($schedule->generateIntervals() as $interval)
                          <tr>
                            <td>{{ $schedule->id }}</td>
                            <td>{{ $schedule->date }}</td>
                           
                            <td>{{ $interval['from'] }}</td>
                            <td>{{ $interval['to'] }}<td>
                            
                              <a href="" class="edit-delete view"> <i class="bi bi-eye pe-2" title="view"></i> </a>
                              <a href="{{ route('schedule.edit',$schedule->id) }}" class="edit-delete edit"> <i class="fa fa-pencil-square-o" aria-hidden="true" title="edit"></i> </a>
                              {!! Form::open(['route'=>['schedule.destroy',$schedule->id],'method' => 'DELETE', 'style' => 'display:inline;']) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true" title="delete"></i>
                                ', ['type' => 'submit', 'class' => 'edit-delete delete border-0', 'onclick' => "return confirm('Are you sure you want to delete this department?')"]) !!}
                              {!! Form::close() !!}
                            </td>

                          </tr>
                          @endforeach
                          @endforeach
                        </tbody>
                      </table>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>      <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
@endsection