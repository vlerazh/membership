@extends('layouts.admin')

@section('title')
Create user
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add new User</h3>
        <div class="card-tools">
            <a href="{{ route('user.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Users</a>
        </div>
    </div>
    <div class="card-body">
        <form  action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label> Name </label>
                    <input v-model="form.name" type="text" name="name" placeholder="Name"
                        class="form-control">
                    
                </div>

                <div class="form-group">
                    <label> Email </label>
                    <input v-model="form.email" type="text" name="email" placeholder="Email"
                        class="form-control" >
                    
                </div>

                <div class="form-group">
                    <label> Phone Number </label>
                    <input v-model="form.phone" type="text" name="phone" placeholder="Phone Number"
                        class="form-control" >
                </div>

                <div class="form-group">
                    <label> Choose Role </label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option selected>-Select role-</option>
                        @forelse ( $roles as $role )
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @empty
                            <option value="No roles avaliable">No roles avaliable</option>
                        @endforelse
                      </select>
                </div>

                <div class="form-group">
                    <label> Password </label>
                    <input v-model="form.password" type="password" name="password" placeholder="Password"
                        class="form-control" >
                </div>

                <div class="form-group">
                    <label for="assign_permissions"></label>
                    @forelse ($permissions as $permission)
                        <input class="form-check-input" name="permissions[]"type="checkbox" value="{{ $permission->name }}">
                        <label for="">{{ $permission->name }}</label> <br>
                    @empty
                        <h5>There are no permissions</h5>
                    @endforelse
                </div>   

            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" v-if="load" v-show="!editMode" class="btn btn-lg btn-primary">Save User</button>
            </div>
        </form>
    </div>
</div>
@endsection