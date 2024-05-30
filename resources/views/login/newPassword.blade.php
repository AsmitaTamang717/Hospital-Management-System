@extends('login.partials.app')
@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 d-flex justify-content-center w-50 ">
				<form class="login100-form validate-form p-0" method="post" action="{{ route('newPasswordSet') }}">
					@csrf
					<span class="login100-form-title">
						 Reset Password
					</span>
					<div class="wrap-input100 validate-input " data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" value={{ $email }} >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					@error('email')
					<div class="text-danger p-2"  style="font-size: 14px;">
						{{ $message }}
					</div>
				 	@enderror

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password') }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					@error('password')
					 <div class="text-danger p-2"  style="font-size: 14px;">
						 {{ $message }}
					 </div>
					@enderror
					
						<div class="container-login100-form-btn">
							<button type="submit" class="btn btn-primary px-4">
								Reset
							</button>
						</div>
				


					<div class="text-center p-t-136">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

