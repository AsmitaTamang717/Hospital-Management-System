@extends('frontend.layouts.app')
@section('content')
@inject('DepartmentHelper','App\Helpers\DepartmentHelper')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Book your Seat</span>
          <h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="appoinment section">
  <div class="container">
    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
    <div class="row">
      <div class="col-lg-12">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Book an appoinment</h2>
            <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p>
               <form  class="appoinment-form" method="post" action="{{ route('appointmentStore')}}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                              <label for="department">Department</label>
                              {{ Form::select('dep_id',$DepartmentHelper->dropdown(), null, [
                                'placeholder' => 'Select Department',
                                'class' => 'form-control  appointment-department',
                                'id'=>'doctor_department','data-message'=>'Department',
                                'autocomplete' => 'off'
                              ]),
                                  }}
                            </div>
                            @error('dep_id')
                            <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="doctor">Doctor</label>
                              {!! Form::select('doc_id', [], null, ['class' => 'form-control appointment-doctor','placeholder' => 'Select Doctor']) !!}
                              @error('doc_id')
                              <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                              @enderror
                            </div>

                            <button type="button" class="btn btn-primary d-none" id="modalTriggerBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              Launch demo modal
                            </button>
                      
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Schedules</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body scheduleIntervals row">
                                  {{-- intervals here --}}
                                
                                  
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="time_interval">Schedule Time</label>
                              <input name="time_interval" id="timeValue" type="text"  class="form-control" placeholder="Time">
                              <input name="schedule_id" id="schedule_id" type="hidden"  class="form-control">
                          </div>
                          @error('time_interval')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                              <label for="name">Full Name</label>  <span class="text-danger ps-1">*</span>
                                <input name="fullname" id="name" type="text" class="form-control" placeholder="Full Name">
                            </div>
                            @error('fullname')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                        <div class="col-lg-6">
                          {{ Form::label('gender', 'Gender', ['class' => 'form-label']) }} <span class="text-danger ps-1">*</span>
                          {{ Form::select('gender',config('dropdown.gender'), null,['class' => 'form-control form-select'] ); }}
                          @error('gender')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="name">Date of Birth</label>  <span class="text-danger ps-1">*</span>
                              <input name="dob" type="date" class="form-control" placeholder="Date of Birth">
                          @error('dob')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                          </div>
                      </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="permanent_address">Permanent Address</label> <span class="text-danger ps-1">*</span>
                              <input name="permanent_address"  type="text" class="form-control" placeholder="Permanent Address">
                          </div>
                          @error('permanent_address')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="temporary_address">Temporary Adddress</label>
                              <input name="temporary_address"  type="text" class="form-control" placeholder="Temporary Address">
                          </div>
                          @error('temporary_address')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                       
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="age">Age</label> <span class="text-danger ps-1">*</span>
                              <input name="age"  type="text" class="form-control" placeholder="Age">
                          </div>
                          @error('age')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="phone">Phone</label> <span class="text-danger ps-1">*</span>
                              <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone Number">
                          </div>
                          @error('phone')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="parent_name">Parent Name</label>
                              <input name="parent_name" type="text" class="form-control" placeholder="Parent Name">
                          </div>
                          @error('parent_name')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="medical_history">Medical History</label>
                              <input name="medical_history" type="file" class="form-control pt-3" >
                          </div>
                          @error('medical_history')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="email">Email</label>
                              <input name="email" type="text" class="form-control" placeholder="Email">
                          </div>
                          @error('email')
                          <span class="text-danger" style="font-size:14px">{{ $message }}</span> 
                          @enderror
                        </div>

                    </div>

                    <div class="form-group-2 mb-4">
                      <label for="message">Message</label>
                      <textarea name="message" id="message" class="form-control" rows="6" placeholder="Your Message"></textarea>
                    </div>

                    <button class="btn btn-main btn-round-full" type="submit" >Make Appoinment<i class="icofont-simple-right ml-2"></i></button>
                </form>
            </div>
        </div>

        <div class="col-lg-12 d-flex justify-content-center">
          <div class="mt-3 text-center">
            <div class="feature-icon mb-3">
              <i class="icofont-support text-lg"></i>
            </div>
             <span class="h3">Call for an Emergency Service!</span>
              <h2 class="text-color mt-3">+84 789 1256 </h2>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

