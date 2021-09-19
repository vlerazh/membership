@extends('layouts.admin', ['course_id' => $course_id])

@section('content')
<div class="container" >
    <div class="row justify-content-center" >
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">{{ __('message.Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $courses_count }}</h3>
                                    <p>Courses</p>
                                </div>
                                <div class="icon">
                                    <i class="icon ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $members_count }}</h3>
                                    <p>Members</p>
                                </div>
                                <div class="icon">
                                    <i class="icon ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $paid_members_count }} / {{ $members_count }}</h3>
                                    <p>Members with paid courses</p>
                                </div>
                                <div class="icon">
                                    <i class="icon ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>60$</h3>
                                    <p>Income</p>
                                </div>
                                <div class="icon">
                                    <i class="icon ion-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="dashboard">
                        <div class="col-lg-6">
                            <member-chart></member-chart>
                        </div>
                        <div class="col-lg-6">
                            <member-per-course-chart></member-per-course-chart>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
