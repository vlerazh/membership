@extends('layouts.superadmin')

@section('title')
User
@endsection
@section('content')
<div class="p-0">
    <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fa fa-users mr-1"></i>
                Users
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item mr-1">
                        <a class="btn btn-sm btn-primary" href="{{ route('user.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('user.search') }}" method="GET">
                            @csrf
                            <div class="input-group mt-0 input-group-sm" style="width: 350px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search by name, email">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default" ><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Action</th>
                    <th>Date Posted</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td> {{ $user->name }}</td>
                            <td>{{ $user->getRoleNames() }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('user.show', $user->id) }}"> <i class="fa fa-eye"></i> View</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('user.edit', $user->id) }}" > <i class="fa fa-edit"></i> Edit</a>
                                <form action="/user/{{ $user->id }}" class="delete-form" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" onclick="confirm('Are u sure you want to delete?')"> <i class="fa fa-trash"></i> Delete </button>
                                </form>
                            </td>
                            <td>
                                {{ $user->created_at }}
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
</div>
@endsection