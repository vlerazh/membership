@extends('layouts.app')

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
@endsection