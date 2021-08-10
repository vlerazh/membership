@extends('layouts.admin' , ['course_id' => Session::get('course_id')])
@section('title')
Courses
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Courses Table</h3>
        <div class="card-tools">
            <a href="{{ url('courses/create') }}" class="btn btn-primary"><i class="fas fa-shield-alt"></i> Add new Course</a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Course Fee</th>
                    <th>Members</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course )
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->course_fee }}</td>
                        <td></td>
                         <td>
                            <a href="{{ route('courses.edit', $course->id ) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td> 
                    </tr>
                @empty
                    <tr>
                        <td><i class="fa fa-folder-open"></i> No Record found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection