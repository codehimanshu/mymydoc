@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Appointment Booking</div>

                <div class="panel-body">
                    <center><strong>Doctor Application Form</strong></center>
                    <br>
                    @if(count($doctors)==0)
                        No doctors available right now.
                    @else
                        <div class="row">
                            @foreach($doctors as $doctor)
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    Name: {{ $doctor->name }}
                                    <br>
                                    Qualification: {{ $doctor->qualification }}
                                    <br>
                                    <form action="{{ route('book-appointment') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="integer" name="id" readonly="" required="" style="display: none;" value="{{$doctor->id}}">
                                        <input type="text" name="details" placeholder="Details" required="">
                                        <input size="16" type="text" name="datetime" class="form_datetime form-control" id="form_datetime" placeholder="Date Time" required="">                     
                                        <center><input type="submit" name="book" value="Book"></center> 
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function () {
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes();
    var dateTime = date+' '+time;
    $(".form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        startDate: dateTime
    });
});
</script>
@endsection
