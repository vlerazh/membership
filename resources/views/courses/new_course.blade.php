@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card" style="width:24rem;margin:auto;">
        <div class="card-body">
            <form action="/new-course" method="post">
                @csrf
                <div class="form-group">
                    <label for="plan name">Course Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Course Name">
                </div>
                <div class="form-group">
                    <label for="cost">Description:</label>
                    <textarea type="text" class="form-control" name="description" placeholder="Enter Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="cost">Course Fee</label>
                    <input type="number" class="form-control" name="course_fee" placeholder="Enter Fee">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection