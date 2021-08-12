@extends('layouts.app')

@section('content')
	<!-- begin login -->
	<div class="login login-v1 ">
        <div class="login-container">

            <div class="login-header">
                <div class="brand">
                <div class="d-flex align-items-center">
                    <span class="logo"></span> <b>Color</b> Admin
                    </div>
                    <small>Login on Membership App</small>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            
            
            <div class="login-body">
            
                <div class="login-content fs-13px">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control fs-13px h-45px  @error('email') is-invalid @enderror" name="email" id="emailAddress" placeholder="Email Address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control fs-13px h-45px @error('password') is-invalid @enderror" name="password" required id="password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="rememberMe">
                            Remember Me
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn h-45px btn-success d-block w-100 btn-lg">Sign me in</button>
                        </div>
                        <div class="text-gray-500 mt-3">
                            Not a member yet? Click <a href="{{route('register')}}"  class="text-white">here</a> to register.
                        </div>
                    </form>
                </div>
                
                </div>
            
            </div>
	</div>
	<!-- end login -->
@endsection