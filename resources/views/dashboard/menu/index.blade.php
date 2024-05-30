@extends('dashboard.partials.app')
@section('content')
@section('title','Menu')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title d-flex">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                      <i class="mdi mdi-doctor menu-icon"></i>
                    </span> @include('dashboard.partials.breadcrumb')
                  </h3>
                  <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('menu.create') }}" class="btn btn-outline-primary modify-btn" title="Add Menu">
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

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> S.No. </th>
                            <th> Menu name</th>
                            <th> Display Order</th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $count=1
                          @endphp
                          @foreach($menus as $menu)
                            <tr>
                              <td>{{ $count++ }}</td>
                              <td>{{ $menu->menu_name['en'] }}</td>
                              <td>{{ $menu->display_order }}</td>
                              <td>
                                <a href="" class="edit-delete edit"> <i class="fa fa-pencil-square-o" aria-hidden="true" title="edit"></i> </a>
                                {!! Form::open([ 'method' => 'DELETE', 'style' => 'display:inline;']) !!}
                                  {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true" title="delete"></i>
                                  ', ['type' => 'submit', 'class' => 'edit-delete delete border-0', 'onclick' => "return confirm('Are you sure you want to delete this role?')"]) !!}
                                {!! Form::close() !!}
                              </td>
                            </tr>
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