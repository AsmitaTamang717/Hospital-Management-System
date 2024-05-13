@extends('dashboard.partials.app')
@section('content')
@section('title','Doctor')
@section('title-link',route('doctor.index'))
@section('action','Create')
@inject('DepartmentHelper','App\Helpers\DepartmentHelper')
@inject('CountryHelper','App\Helpers\CountryHelper')
@inject('ProvinceHelper','App\Helpers\ProvinceHelper')
<div class="main-panel">
    <div class="content-wrapper">
      <h4 class="card-title">@include('dashboard.partials.breadcrumb')</h4>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                
              {{ Form::open(['method' => 'post', 'class' => 'row g-3', 'route' => 'doctor.store', 'id' => 'myform', 'enctype' => 'multipart/form-data']) }}
              @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                
                    {{-- Basic Details --}}
                    <div class="basic-details active-step" id="1">
                      <fieldset>
                        <legend class="bg-secondary text-center py-2">Basic details</legend>
                      
                        <div class="row">
                          <div class="col-md-4 mt-4">
                            {{ Form::label('name', 'First name', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name','data-message'=>'First Name']) }}
                            <span id="first_name_error" class="text-danger"></span> 
                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('name', 'Middle name', ['class' => 'form-label']) }}
                            {{ Form::text('middle_name', null, ['class' => 'form-control', 'id' => 'middle_name']) }}
                            @error('middle_name')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4">
                            {{ Form::label('name', 'Last name', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name','data-message'=>'Last Name']) }}
                            <span id="last_name_error" class="text-danger"></span> 
                            @error('last_name')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>
    

                          <div class="col-md-4 mt-4">
                            {{ Form::label('dob_bs', 'Date of birth(BS)', ['class' => 'form-label',]) }} <span class="text-danger">*</span>
                            {{ Form::text('dob_bs',null, ['class' => 'form-control nepali-date-picker-bs', 'id' => 'dob_bs','data-message'=>'DOB']) }}
                            <span id="dob_bs_error" class="text-danger"></span> 
                            @error('dob_bs')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('dob_ad', 'Date of birth(AD)', ['class' => 'form-label']) }}
                            {{ Form::date('dob_ad', null, ['class' => 'form-control nepali-date-picker-ad', 'id' => 'dob_ad']) }}
                            @error('dob_ad')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('gender', 'Gender', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::select('gender',config('dropdown.gender'), null,['class' => 'form-control form-select','id'=>'gender'] ); }}
                            @error('gender')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('phone', 'Phone', ['class' => 'form-label']) }}  <span class="text-danger">*</span>
                            {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone','data-message'=>'Phone']) }}
                            <span id="phone_error" class="text-danger"></span> 
                            @error('phone')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('license_no', 'License_no', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('license_no',null, ['class' => 'form-control', 'id' => 'license_no','data-message'=>'License number']) }}
                            <span id="license_no_error" class="text-danger"></span> 
                            @error('license_no')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('image_file', 'Profile', ['class' => 'form-label']) }} 
                            {{ Form::file('image_file', ['class' => 'form-control', 'id' => 'image_file']) }}
                            @error('image_file')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('department', 'Department', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::select('dep_id',$DepartmentHelper->dropdown(), null, ['placeholder' => 'Select Department','class' => 'form-control form-select','id'=>'doctor_department','data-message'=>'Department']); }}
                            <span id="doctor_department_error" class="text-danger"></span> 
                            @error('department')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-12 mt-4">
                            <div class="previous-next d-flex justify-content-end">
                              <button type="button" class="btn btn-info" onclick="Basicnext()">Next</button>
                            </div>
                          </div>
                        </div>

                      </fieldset>
                    </div>

                    {{-- Address Details --}}
                    <div class="address-details mt-4 d-none" id="2">
                      <fieldset>
                        <legend class="bg-secondary text-center py-2">Address details</legend>
                        <h4 class="pt-4">Permanent Address</h4>
                        <div class=" permanent-address-details row">
                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('country', 'Country', ['class' => 'form-label']) }}
                            <span class="text-danger">*</span>
                            {{ Form::select(
                                'country_id',
                                $CountryHelper->dropdown(),
                                156,
                                [
                                    'placeholder' => 'Select Country',
                                    'class' => 'form-control form-select',
                                    'id' => 'country',
                                    'data-message' => 'Country',
                                    'autocomplete' => 'off',
                                ]
                            ) }}
                            <span id="country_error" class="text-danger"></span> 
                            @error('country')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('permanent_province', 'Province', ['class' => 'form-label']) }}  <span class="text-danger">*</span>
                            {{ Form::select('permanent_province_id',$ProvinceHelper->dropdown(), null,[ 
                                            'placeholder' => 'Select Province',
                                            'class' => 'form-control form-select province',
                                            'id'=>'permanent_province',
                                            'data-message'=>'Permanent Province',
                                            'autocomplete'=>"off"]); }}
                            <span id="permanent_province_error" class="text-danger"></span> 
                            @error('permanent_province_id')
                            <span class="text-danger"></span> 
                            @enderror

                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('permanent_district', ' District', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::select('permanent_district_id',[],null,
                                    [
                                    'placeholder'=>'Select district',
                                    'class' => 'form-control form-select district',
                                     'id' => 'permanent_district',
                                     'data-message' => 'Permanent District'
                                    ]) }}
                             <span id="permanent_district_error" class="text-danger"></span> 
                             @error('permanent_district_id')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>                         
    
                          <div class="col-md-4 mt-4"> 
                            {{ Form::label('permanent_municipality_id', 'Municipality', ['class' => 'form-label']) }}  <span class="text-danger">*</span>
                            {{ Form::select('permanent_municipality_id',[], null,
                                    [
                                    'placeholder'=>'Select municipality',
                                    'class' => 'form-control form-select municipality', 
                                    'id' => 'permanent_municipality_name',
                                    'data-message' => "Permanent Municipality"
                                    ]); }}
                            <span id="permanent_municipality_name_error" class="text-danger"></span> 
                            @error('permanent_municipality_id')
                            <span class="text-danger"></span> 
                            @enderror
                           
                          </div>


                          <div class="col-md-4 mt-4">
                            {{ Form::label('permanent_street_name', 'Street Name', ['class' => 'form-label']) }}<span class="text-danger">*</span>
                            {{ Form::text('permanent_street_name',null, ['class' => 'form-control', 'id' => 'permanent_street_name']) }}
                          </div>
                          @error('permanent_street_name')
                          <span class="text-danger"></span> 
                          @enderror
                         </div>

                         <div class="row">
                          <div class="col-md-12 mt-4">
                            <div class="add-temporary d-flex justify-content-center">
                              <button type="button" class="btn btn-dark" id="addTemporaryDetails"> Add temporary details</button>
                            </div>
                          </div>
                         </div>
                        
                         <div class="temporary-address-details">
                          
                         </div>

                         <div class="row">
                          <div class="col-md-12 mt-4">
                            <div class="previous-next d-flex justify-content-end">
                              <button type="button" class="btn btn-info me-2" onclick="previous()">Previous</button>
                              <button type="button" class="btn btn-info" onclick="Addressnext()"> Next</button>
                            </div>
                          </div> 
                         </div>
                        
                      </fieldset>
                    </div>

                    {{-- Education Details --}}
                    <div class="education-details  d-none" id="3">
                      <fieldset>
                        <legend class="bg-secondary text-center py-2">Education details</legend>
                      
                        <div class="education-details-category position-relative row mb-4">
                          <div class="col-md-4 mt-4">
                            {{ Form::label('degree', 'Degree', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::select('degree[]',config('doctor_degree.degree'), null,
                             [
                              'class' => 'form-control form-select',
                              'placeholder' =>'select degree',
                               'id' => 'degree',
                               'data-message' => 'Degree',
                               'autocomplete' => 'off',
                              ]) }}
                            <span id="degree_error" class="text-danger"></span>
                            @error('degree')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4">
                            {{ Form::label('specialization', 'Specialization', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('specialization[]', null,
                             [
                              'class' => 'form-control',
                              'id' => 'specialization',
                              'data-message' => 'Specialization'
                            ]) }}
                            <span id="specialization_error"  class="text-danger"></span>
                            @error('specialization')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>
    
                          
                          <div class="col-md-4 mt-4">
                            {{ Form::label('institution', 'Institution', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('institution[]', null,
                             ['class' => 'form-control',
                              'id' => 'institution',
                              'data-message' => 'Institution',
                              ]) }}
                            <span id="institution_error" class="text-danger"></span>
                            @error('institution')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('completion_year_bs', 'Completion Year(BS)', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('completion_year_bs[]',null,
                             ['class' => 'form-control nepali-date-picker-bs',
                             'id'=> 'completion_year_bs',
                             'data-message' => 'Completion Year',
                             ]) }}
                            <span id='completion_year_bs_error' class="text-danger"></span>
                            @error('completion_year_bs')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('completion_year_ad', 'Completion Year(AD)', ['class' => 'form-label']) }} 
                            {{ Form::date('completion_year_ad[]', null, ['class' => 'form-control nepali-date-picker-ad']) }}
                            <span class="text-danger"></span>
                            @error('completion_year_ad')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('obtained_marks', 'Obtained Marks', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('obtained_marks[]', null, ['class' => 'form-control', 'id' => 'obtained_marks','data-message'=>'Obtained Marks']) }}
                            <span id="obtained_marks_error"class="text-danger"></span>
                            @error('obtained_marks')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>
                        </div>

                        {{-- cloned education details --}}
                        <div class="new-Education-details">
                          
                        </div>

                        {{-- add button --}}
                        <div class="row">
                          <div class="col-md-12 mt-4">
                            <div class="add-temporary d-flex justify-content-center">
                              <button type="button" class="btn btn-dark" id="addEducation_1"> Add More</button>
                            </div>
                          </div>
                         </div>

                        <div class="row">
                          <div class="col-md-12 mt-4">
                            <div class="previous-next d-flex justify-content-end">
                              <button type="button" class="btn btn-info me-2" onclick="previous()">Previous</button>
                              <button type="button" class="btn btn-info" onclick="Educationnext()">Next</button>
                            </div>
                          </div> 
                        </div>
                       
                      </fieldset>
                    </div>

                    {{-- Experience Details --}}
                    <div class="experience-details d-none" id="4">
                      <fieldset>
                        <legend class="bg-secondary text-center py-2">Experience details</legend>
            
                        <div class="experience_1 position-relative row">
                          <div class="col-md-4 mt-4">
                            {{ Form::label('organization', 'Organization', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('organization[]', null, ['class' => 'form-control', 'id' => 'organization','data-message'=>'Organization']) }}
                            <span id="organization_error" class="text-danger"></span>
                            @error('organization')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4">
                            {{ Form::label('position', 'Position', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('position[]', null, ['class' => 'form-control', 'id' => 'position','data-message'=>'Position']) }}
                            <span id="position_error" class="text-danger"></span>
                            @error('position')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>
    
                          <div class="col-md-4 mt-4">
                            {{ Form::label('start_date_bs', 'Start date(BS)', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('start_date_bs[]', null, ['class' => 'form-control nepali-date-picker-bs', 'id' => 'start_date_bs','data-message'=>'Start date']) }}
                            <span id="start_date_bs_error" class="text-danger"></span>
                            @error('start_date_bs')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('start_date_ad', 'Start date(AD)', ['class' => 'form-label']) }} 
                            {{ Form::date('start_date_ad[]', null,
                             ['class' => 'form-control nepali-date-picker-ad'
                             , 
                             'id' => 'start_date_ad
                             ']) }}
                              @error('start_date_ad')
                              <span class="text-danger"></span> 
                              @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('end_date_bs', 'End date(BS)', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::text('end_date_bs[]', null, ['class' => 'form-control nepali-date-picker-bs', 'id' => 'end_date_bs','data-message'=>'End date']) }}
                            <span id="end_date_bs_error" class="text-danger"></span>
                            @error('end_date_bs')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-4 mt-4">
                            {{ Form::label('end_date_ad', 'End date(AD)', ['class' => 'form-label']) }} 
                            {{ Form::date('end_date_ad[]', null, ['class' => 'form-control nepali-date-picker-ad',  'id' => 'end_date_ad']) }}
                            @error('end_date_ad')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>

                          <div class="col-md-12 mt-4">
                            {{ Form::label('description', 'Job Description', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                            {{ Form::textarea('description[]',null, ['class' => 'form-control editor','id'=>'experience_description','data-message'=>'Description']) }}
                            <span id="experience_description_error" class="text-danger"></span>
                            @error('description')
                            <span class="text-danger"></span> 
                            @enderror
                          </div>                         
                        </div>

                      {{-- cloned experience details --}}
                        <div class="experience_2 row mt-4">

                        </div>

                        {{-- add button --}}
                        <div class="row">
                          <div class="col-md-12 mt-4">
                            <div class="add-temporary d-flex justify-content-center">
                              <button type="button" class="btn btn-dark " id="addExperience"> Add More</button>
                            </div>
                          </div>
                         </div>

                        <div class="col-md-12 mt-4">
                            <div class="previous-next d-flex justify-content-end">
                              <button type="button" class="btn btn-info me-2" onclick="previous()">Previous</button>
                              <button type="button" class="btn btn-info" onclick="Experiencenext()">Next</button>
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
                              {{ Form::text('username',null, ['class' => 'form-control', 'id' => 'username','data-message'=>'Username']) }}
                                <span id="username_error" class="text-danger"></span>
                                @error('username')
                                <span class="text-danger"></span> 
                                @enderror
                            </div>
      
                            <div class="col-md-4 mt-4">
                              {{ Form::label('email', 'Email', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                              {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email','data-message' => 'Email']) }}
                                <span id="email_error" class="text-danger"></span>
                                @error('email')
                                <span class="text-danger"></span> 
                                @enderror
                            </div>
      
                            <div class="col-md-4 mt-4"> 
                              {{ Form::label('password', 'Password', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                              {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'password','data-message'=>'Password']) }}
                                <span id="password_error" class="text-danger"></span>
                                @error('password')
                                <span class="text-danger"></span> 
                                @enderror
                            </div>

                            <div class="col-md-4 mt-4">
                              {{ Form::label('confirm_password', 'Confirm Password', ['class' => 'form-label']) }} <span class="text-danger">*</span>
                              {{ Form::text('confirm_password', null, ['class' => 'form-control', 'id' => 'confirm_password','data-message'=>'Confirm password']) }} 
                                <span id="confirm_password_error" class="text-danger"></span>
                                <span id="confirm_password_compare_error" class="text-danger"></span>
                                @error('confirm_password')
                                <span class="text-danger"></span> 
                                @enderror

                            </div>

                            <div class="col-md-12 mt-4">
                              <div class="previous-next d-flex justify-content-end">
                                <button type="button" class="btn btn-info me-2" onclick="previous()">Previous</button>
                                <button type="button" class="btn btn-success" onclick="Formsubmit()" >Submit</button>
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