@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <center>
            <a href="/book" class="btn btn-primary">Book Appointment</a>
        </center>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Appointments</div>

                <div class="panel-body">
                    @if(count($appointments)==0)
                        You have not booked any appointments yet.
                    @else
                        @foreach($appointments as $appointment)
                            @if($appointment->appointment>=Carbon\Carbon::now())
                                You have an appointment with {{ $appointment->name }} at {{ $appointment->appointment}}.
                                <br>
                                Details: {{ $appointment->details }}
                                <br>
                                Status:
                                    @if($appointment->status==0)
                                        Waiting for Acceptance by Doctor
                                    @elseif($appointment->status==1)
                                        Accepted
                                    @elseif($appointment->status==2)
                                        Rejected
                                    @else
                                        Expired
                                    @endif
                                <br><br>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
