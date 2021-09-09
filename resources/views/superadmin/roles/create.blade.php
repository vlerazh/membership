@extends('layouts.superadmin')
@section('pageName')
Create Roles
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add new Role</h3>
        <div class="card-tools">
            <a href="{{ route('roles.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Roles</a>
        </div>
    </div>
    <div class="card-body">
        <form  action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input  type="text" name="name" placeholder="Role Name"class="form-control" >
   
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
                <button type="submit"  class="btn btn-lg btn-primary"><i class="fa fa-save"></i> Save Role</button>
            </div>
        </form>
    </div>
</div>

@endsection