@extends('layouts.admin' , ['course_id' => Session::get('course_id')])
@section('content')
<div class="container">
    <div class="card" style="width:54rem;margin:auto;">
        <div class="card-body">
            <form action="/sendSms" method="post">
                @csrf
                <div class="form-group">
                    <label for="plan name">To:</label>
                    <select data-placeholder="Select Members" multiple class="chosen-select form-select" name="numbers[]">
                        <option value=""></option>
                        @foreach ($members as $member)
                            <option value="{{ $member->phone }}">{{ $member->name }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label >Message</label>
                    <textarea  class="form-control" name="sms_message" placeholder="Enter Message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
@push('script')
<script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script>   
@endpush

@endsection