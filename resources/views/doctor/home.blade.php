@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <strong><center>New Appointments</center></strong>
                    <div class="row">
                        <br>
                        @foreach($appointments as $appointment)
                            <div class="col-xs-12 col-md-6 col-lg-4">
                                @if($appointment->status==0)
                                    Patient Name: {{ $appointment->name }}
                                    <br>
                                    Details:  {{ $appointment->details }}
                                    <br>
                                    Date Time: {{ $appointment->appointment }}
                                    <br>
                                    <form action="/accept" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        <input type="integer" name="id" value="{{ $appointment->id }}" required="" readonly="" style="display: none;">
                                        <input type="submit" name="accept" value="Accept">
                                    </form>
                                    <form action="/reject" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        <input type="integer" name="id" value="{{$appointment->id}}" required="" readonly="" style="display: none;">
                                        <input type="submit" name="reject" value="Reject">
                                    </form>
                                    <br><br>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <strong><center>Upcoming Appointments</center></strong>
                    <div class="row">
                        <br>
                        @foreach($appointments as $appointment)
                            <div class="col-xs-12 col-md-6 col-lg-4">
                                @if($appointment->status==1)
                                    Patient Name: {{ $appointment->name }}
                                    <br>
                                    Details:  {{ $appointment->details }}
                                    <br>
                                    Date Time: {{ $appointment->appointment }}
                                    <br>
                                @endif
                                <br>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
