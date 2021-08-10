@extends('layouts.admin' , ['course_id' => Session::get('course_id')])
@section('content')
<div class="container">
    <div class="card" style="width:24rem;margin:auto;">
        <div class="card-body">
            <form action="/members" method="post">
                @csrf
                <div class="form-group">
                    <label for="plan name">Member Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Member Name">
                </div>
                <div class="form-group">
                    <label for="cost">Lastname:</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Enter Member Lastname">
                </div>
                <div class="form-group">
                    <label for="cost">Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Member Email">
                </div>
                <div class="form-group">
                    <label for="cost">Phone:</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Member Phone">
                </div>
                <div class="form-group">
                    <label for="cost">Address:</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Member Address">
                </div>
                <div class="form-group">
                    <label for="cost">City:</label>
                    <input type="text" class="form-control" name="city" placeholder="Enter Member City">
                </div>
                <div class="form-group">
                    <label for="cost">Country:</label>
                    <input type="text" class="form-control" name="country" placeholder="Enter Member Country">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection