@extends('layouts.admin' , ['course_id' => Session::get('course_id')])
@section('title')
Members 
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Members Table</h3>
        <div class="card-tools">
            <a href="{{ url('members/create') }}" class="btn btn-primary"><i class="fas fa-shield-alt"></i> Add new Member</a>
            <form action="/import" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <input type="file" name="import" value="Import" id="file">
                <a class="btn btn-warning" href="{{ route('export') }}">Export</a>
            </form>
            <a class="btn btn-secondary"  onclick="window.print()">Print</a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Course Fee</th>
                    <th>Paid</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($members as $member )
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }} {{ $member->lastname }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->address }},{{ $member->city }},{{ $member->country }}</td>
                        <td>{{ App\Models\Course::where('id',Session::get('course_id'))->first()->course_fee }}</td>
                        <td>
                            <form action="/paid/{{ $member->id }}" method="POST" id="paid-form">
                                @csrf
                                @method('put')
                                <input type="checkbox" name="paid" id="paid " onChange="this.form.submit()"
                                @if ($member->courses()->where('course_id',Session::get('course_id'))->first()->pivot->paid === 1 )
                                    checked
                                @endif
                                >
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('members.edit', $member->id ) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('members.destroy', $member) }}" method="POST" style="display: inline-block;">
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
<script>
    document.getElementById("file").onchange = function() {
        document.getElementById("form").submit();
    };
    document.getElementById("paid").onchange = function() {
        document.getElementById("paid-form").submit();
    };
</script>
@endsection
