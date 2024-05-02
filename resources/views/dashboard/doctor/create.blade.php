@extends('dashboard.partials.app')
@section('content')
@inject('DepartmentHelper','App\Helpers\DepartmentHelper')
@inject('CountryHelper','App\Helpers\CountryHelper')
@inject('ProvinceHelper','App\Helpers\ProvinceHelper')
@inject('MunicipalityHelper','App\Helpers\MunicipalityHelper')
@inject('DistrictHelper','App\Helpers\DistrictHelper')
@inject('MuniTypeHelper','App\Helpers\MuniTypeHelper')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Doctor</h4>
                
                    {{ Form::open(['method' => 'post', 'class' => 'row g-3 mt-4', 'route' => 'doctor.store']); }}
                    @csrf
                  
                    {{-- Basic Details --}}
                    <div class="basic-details active-step" id="1">
                      <fieldset>
                        <legend class="bg-secondary text-center py-2">Basic details</legend>
            
                        <div class="row">
                          <div class="col-md-4 mt-4">
                            {{ Form::label('name', 'First name', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name']) }}
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('name', 'Middle name', ['class' => 'form-label']) }}
                            {{ Form::text('middle_name', null, ['class' => 'form-control', 'id' => 'middle_name']) }}
                            @error('middle_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4">
                            {{ Form::label('name', 'Last name', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
    

                          <div class="col-md-4 mt-4">
                            {{ Form::label('dob_bs', 'Date of birth(BS)', ['class' => 'form-label',]) }} <span class="text-danger">*</span>
                            {{ Form::text('dob_bs',null, ['class' => 'form-control nepali-date-picker-bs', 'id' => 'dob_bs']) }}
                            @error('dob_bs')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('dob_ad', 'Date of birth(AD)', ['class' => 'form-label']) }}
                            {{ Form::date('dob_ad', null, ['class' => 'form-control nepali-date-picker-ad', 'disabled', 'id' => 'dob_ad']) }}
                            @error('dob_ad')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('gender', 'Gender', ['class' => 'form-label']) }}
                            {{ Form::select('gender',config('dropdown.gender'), null,['class' => 'form-control form-select'] ); }}
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('phone', 'Phone', ['class' => 'form-label']) }}  <span class="text-danger">*</span>
                            {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('license_no', 'License_no', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('license_no',null, ['class' => 'form-control', 'id' => 'license_no']) }}
                            @error('license_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('image_path', 'Profile', ['class' => 'form-label']) }} 
                            {{ Form::file('image_path', ['class' => 'form-control', 'id' => 'image_path']) }}
                            @error('image_path')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('department', 'Department', ['class' => 'form-label']) }}
                            {{ Form::select('id',$DepartmentHelper->dropdown(), null, ['placeholder' => 'Select Department','class' => 'form-control form-select']); }}
                            @error('id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-12 mt-4">
                            <div class="previous-next d-flex justify-content-end">
                              <button type="button" class="btn btn-info" onclick="next()">Next</button>
                            </div>
                          </div>
                        </div>

                      </fieldset>
                    </div>

                    {{-- Address Details --}}
                    <div class="address-details mt-4 d-none" id="2">
                      <fieldset>
                        <legend class="bg-secondary text-center py-2">Address details</legend>
            
                        <div class="row">
                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('country', 'Country', ['class' => 'form-label']) }}  <span class="text-danger">*</span>
                            {{ Form::select('country',$CountryHelper->dropdown(), null, ['placeholder' => 'Select Country','class' => 'form-control form-select']); }}
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('permanent province', 'Permanent Province', ['class' => 'form-label']) }}  <span class="text-danger">*</span>
                            {{ Form::select('permanent province',$ProvinceHelper->dropdown(), null, ['placeholder' => 'Select Province','class' => 'form-control form-select']); }}
                            @error('permanent province')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('permanent_district', 'Permanent District', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::select('permanent_district',$DistrictHelper->dropdown(),null, ['placeholder' => 'Select District','class' => 'form-control form-select', 'id' => 'permanent_district']) }}
                            @error('permanent_district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>                         
    
                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('permanent_municipality_name', 'Permanent Municipality', ['class' => 'form-label']) }}  <span class="text-danger">*</span>
                            {{ Form::select('permanent_municipality_name',$MunicipalityHelper->dropdown(), null, ['placeholder' => 'Select Municpality','class' => 'form-control form-select']); }}
                            @error('permanent_municipality_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('permanent_muni_type', 'Permanent Municipality Type ', ['class' => 'form-label']) }}  <span class="text-danger">*</span>
                            {{ Form::select('permanent_muni_type',$MuniTypeHelper->dropdown(), null, ['placeholder' => 'Select Municpality Type','class' => 'form-control form-select']); }}
                            @error('permanent_muni_types')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>


                          <div class="col-md-4 mt-4">
                            {{ Form::label('permanent_street_name', 'Permanent Street Name', ['class' => 'form-label']) }}
                            {{ Form::text('permanent_street_name',null, ['class' => 'form-control', 'id' => 'permanent_street_name']) }}
                            @error('permanent_street_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
              
                          <div class="col-md-12 mt-4">
                            <div class="previous-next d-flex justify-content-end">
                              <button type="button" class="btn btn-info me-2" onclick="previous()">Previous</button>
                              <button type="button" class="btn btn-info" onclick="next()"> Next</button>
                            </div>
                          </div>

                         </div>
                      </fieldset>
                    </div>

                    {{-- Education Details --}}
                    <div class="education-details d-none" id="3">
                      <fieldset>
                        <legend class="bg-secondary text-center py-2">Education details</legend>
            
                        <div class="row">
                          <div class="col-md-4 mt-4">
                            {{ Form::label('degree', 'Degree', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('degree', null, ['class' => 'form-control', 'id' => 'degree']) }}
                            @error('degree')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4">
                            {{ Form::label('specialization', 'Specialization', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('specialization', null, ['class' => 'form-control', 'id' => 'specialization']) }}
                            @error('specialization')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
    
                          
                          <div class="col-md-4 mt-4">
                            {{ Form::label('institution', 'Institution', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('institution', null, ['class' => 'form-control', 'id' => 'institution']) }}
                            @error('institution')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('completion_year_bs', 'Completion Year(BS)', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('completion_year_bs',null, ['class' => 'form-control nepali-date-picker-bs', 'id' => 'completion_year_bs']) }}
                            @error('completion_year_bs')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('completion_year_ad', 'Completion Year(AD)', ['class' => 'form-label']) }} 
                            {{ Form::date('completion_year_ad', null, ['class' => 'form-control nepali-date-picker-ad', 'disabled' , 'id' => 'completion_year_ad']) }}
                            @error('completion_year_ad')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('obtained_marks', 'Obtained Marks', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('obtained_marks', null, ['class' => 'form-control', 'id' => 'obtained_marks']) }}
                            @error('obtained_marks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-12 mt-4">
                            <div class="previous-next d-flex justify-content-end">
                              <button type="button" class="btn btn-info me-2" onclick="previous()">Previous</button>
                              <button type="button" class="btn btn-info" onclick="next()">Next</button>
                            </div>
                          </div> 

                        </div>
                      </fieldset>
                    </div>

                    {{-- Experience Details --}}
                    <div class="experience-details d-none" id="4">
                      <fieldset>
                        <legend class="bg-secondary text-center py-2">Experience details</legend>
            
                        <div class="row">
                          <div class="col-md-4 mt-4">
                            {{ Form::label('oraganization', 'Organization', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('oraganization', null, ['class' => 'form-control', 'id' => 'oraganization']) }}
                            @error('oraganization')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4">
                            {{ Form::label('position', 'Position', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('position', null, ['class' => 'form-control', 'id' => 'specialization']) }}
                            @error('position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4">
                            {{ Form::label('start_date_bs', 'Start date(BS)', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('start_date_bs', null, ['class' => 'form-control nepali-date-picker-bs', 'id' => 'start_date_bs']) }}
                            @error('start_date_bs')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('start_date_ad', 'Start date(AD)', ['class' => 'form-label']) }} 
                            {{ Form::date('start_date_ad', null, ['class' => 'form-control nepali-date-picker-ad','disabled', 'id' => 'start_date_ad']) }}
                            @error('start_date_ad')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('end_date_bs', 'End date(BS)', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('end_date_bs', null, ['class' => 'form-control nepali-date-picker-bs', 'id' => 'end_date_bs']) }}
                            @error('end_date_bs')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('end_date_ad', 'End date(AD)', ['class' => 'form-label']) }} 
                            {{ Form::date('end_date_ad', null, ['class' => 'form-control nepali-date-picker-ad', 'disabled', 'id' => 'end_date_ad']) }}
                            @error('end_date_ad')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-12 mt-4">
                            {{ Form::label('description', 'Job Description', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::textarea('description',null, ['class' => 'form-control', 'id' => 'editor', 'placeholder' => 'Describe your job']) }}
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="previous-next d-flex justify-content-end">
                              <button type="button" class="btn btn-info me-2" onclick="previous()">Previous</button>
                              <button type="button" class="btn btn-info" onclick="next()">Next</button>
                            </div>
                          </div>
                          
                        </div>

                      </fieldset>
                    </div>

                    {{-- User Details --}}
                    <div class="user-details d-none" id="5">
                      <fieldset>
                        <legend class="bg-secondary text-center py-2">User details</legend>
            
                        <div class="row">
                          <div class="col-md-4 mt-4">
                            {{ Form::label('username', 'Username', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('username',null, ['class' => 'form-control', 'id' => 'username']) }}
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4">
                            {{ Form::label('email', 'Email', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('password', 'Password', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) }}
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('confirm_password', 'Confirm Password', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('confirm_password', null, ['class' => 'form-control', 'id' => 'confirm_password']) }} 
                            @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-12 mt-4">
                            <div class="previous-next d-flex justify-content-end">
                              <button type="button" class="btn btn-info me-2" onclick="previous()">Previous</button>
                              <button type="button" class="btn btn-success">Submit</button>
                            </div>
                          </div>

                        </div>

                      </fieldset>
                    </div>

                    {{  Form::close(); }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection