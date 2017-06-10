@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Doctor Application Form</div>

                <div class="panel-body">
                    <center><strong>Doctor Application Form</strong></center>
                    <form action="{{ route('doctor-application') }}" method="POST">
                        {{ csrf_field() }}
                        <br>
                        <br>
                        <input type="text" name="qualification" placeholder="Qualification" required="">
                        <br>
                        <br>
                        Form fields to upload required documents.
                        <br>
                        <br>
                        <br>
                        <br>
                        <center><input type="submit" name="apply" value="Apply"></center> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
