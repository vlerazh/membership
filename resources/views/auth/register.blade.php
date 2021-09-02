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
                    <small>Register on Membership App</small>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            
            
            <div class="login-body">
            
                <div class="login-content fs-13px">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control fs-13px h-45px   @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required id="emailAddress" placeholder="Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
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
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control fs-13px h-45px" name="password_confirmation" required  placeholder="Confirm Password">
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control fs-13px h-45px " name="company_name"   placeholder="Company name (optional)">
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn h-45px btn-success d-block w-100 btn-lg">Sign me up</button>
                        </div>
                        <div class="text-gray-500 mt-3">
                            Already a member? Click <a href="{{route('login')}}"  class="text-white">here</a> to login.
                        </div>
                    </form>
                </div>
                
                </div>
            
            </div>
	</div>
	<!-- end login -->
@endsection