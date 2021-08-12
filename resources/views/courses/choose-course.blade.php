@extends('layouts.app')
{{-- 
@section('content')
    <nav>
        <ul>
            <li class="nav-item d-none d-sm-inline-block"><a href="{{ url('/new-course') }}">Create a new Course</a></li>
            <li class="nav-item d-none d-sm-inline-block">

                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <p>
                        <i class="nav-icon fa fa-power-off"></i>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <div class="courses">
        <ul>
            @forelse ($courses as $course)
                <li>
                    <a href="{{ route('home' , ['course_id' => $course->id]) }}">{{ $course->name }}</a>
                </li>
            @empty
                <p>You don't have any course. <a href="{{ url('/new-course') }}">Create one</a></p>
            @endforelse
        </ul>
    </div>
@endsection --}}

@section('content')
    <div id="page-container" class=" choose-course">
        <div id="header" class="header navbar">
            <!-- begin container -->
            <div class="container">

                <!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse" id="header-navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.html" class="navbar-brand">
                            <span class="brand-logo"></span>
                            <span class="brand-text">
                                <span class="text-theme">Color</span> Admin
                            </span>
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ url('/new-course') }}">{{ __('CREATE A NEW COURSE') }}</a>
                        </li>
                        <li class="active">
                            <a href="#home" data-click="scroll-to-target">{{ __('HOME') }}</a>
                        </li>
                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">LOGOUT</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
                <!-- end navbar-collapse -->
            </div>
            <!-- end container -->
        </div>
        <div id="courses">
            <div class="container">
                <div class="row">
                    @forelse ($courses as $course)
                        <div class="col-xl-3 course">
                            <a href="{{ route('home' , ['course_id' => $course->id]) }}" class="btn">
                                <p>{{ $course->name }}</p>
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection