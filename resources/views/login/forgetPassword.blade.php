@extends('login.partials.app')
@section('content')
			@if(session('message'))
			<div class="alert alert-success session-message text-center position-relative container"> 
				{{ session('message') }} 
				<i class="bi bi-x-circle position-absolute pe-2" style="top:5px; right:0px; font-size:18px; cursor:pointer" onclick="closeSession()"></i>
			</div>
			@endif
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-0 d-flex justify-content-center">
				<form class="login100-form validate-form d-flex flex-column align-items-center py-4" method="post" action="{{ route('resetPassword') }}">
					@csrf
					<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
						<a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo" /></a>
					  </div>
					<span class="forgetpassword-form-title">
						 Forget your password
					</span>
					<div class="wrap-input100 validate-input w-100 mt-4" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					@error('email')
					<div class="text-danger"  style="font-size: 14px;">
						{{ 'Email does not exist' }}
					</div>
				 	@enderror
					 <div>
						{{ Form::submit('Send Reset Link', ['class' => 'btn bg-primary px-4 text-light mt-2']) }}
					 </div>
				</form>
			</div>
		</div>
	</div>
@endsection

