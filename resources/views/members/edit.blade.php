@extends('layouts.admin' , ['course_id' => Session::get('course_id')])
@section('content')
<div class="container">
    <div class="card" style="width:24rem;margin:auto;">
        <div class="card-body">
            <form action="/members/{{ $member->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="plan name">Member Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $member->name }}">
                </div>
                <div class="form-group">
                    <label for="cost">Lastname:</label>
                    <input type="text" class="form-control" name="lastname" value="{{ $member->lastname }}">
                </div>
                <div class="form-group">
                    <label for="cost">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $member->email }}">
                </div>
                <div class="form-group">
                    <label for="cost">Phone:</label>
                    <input type="text" class="form-control" name="phone" value="{{ $member->phone }}">
                </div>
                <div class="form-group">
                    <label for="cost">Address:</label>
                    <input type="text" class="form-control" name="address" value="{{ $member->address }}">
                </div>
                <div class="form-group">
                    <label for="cost">City:</label>
                    <input type="text" class="form-control" name="city" value="{{ $member->city }}">
                </div>
                <div class="form-group">
                    <label for="cost">Country:</label>
                    <input type="text" class="form-control" name="country" value="{{ $member->country }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection