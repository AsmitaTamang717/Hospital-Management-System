@extends('login.partials.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-success session-message text-center position-relative container">
            {{ session('message') }}
            <i class="bi bi-x-circle position-absolute pe-2" style="top:5px; right:0px; font-size:18px; cursor:pointer"
                onclick="closeSession()"></i>
        </div>
    @endif
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login/images/hospital.jpg') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post" action="{{ route('authenticateUser') }}">
                    @csrf
                    <span class="login100-form-title">
                        Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email"
                            value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    @error('email')
                        <div class="text-danger p-2" style="font-size: 14px;">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password"
                            value="{{ old('password') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    @error('password')
                        <div class="text-danger p-2" style="font-size: 14px;">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>


                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="{{ route('forgetPassword') }}">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
