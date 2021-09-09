@extends('layouts.superadmin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Plans</h3>

                    <div class="card-tools">
                        <a href="{{ route('create.plan') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create new plan</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Cost</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->id }}</td>
                                        <td>{{ $plan->name }}</td>
                                        <td>${{ number_format($plan->cost, 2) }} monthly</td>
                                        <td>{{ $plan->description }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning">Edit Plan</a>
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
        </div>
    </div>
</div>
@endsection