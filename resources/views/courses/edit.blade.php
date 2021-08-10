@extends('layouts.admin' , ['course_id' => Session::get('course_id')])
@section('content')
<div class="container">
    <div class="card" style="width:24rem;margin:auto;">
        <div class="card-body">
            <form action="/courses/{{ $course->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="plan name">Course Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $course->name }}">
                </div>
                <div class="form-group">
                    <label for="cost">Description:</label>
                    <textarea type="text" class="form-control" name="description"> {{ $course->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="cost">Course Fee</label>
                    <input type="number" class="form-control" name="course_fee" value="{{ $course->course_fee }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection