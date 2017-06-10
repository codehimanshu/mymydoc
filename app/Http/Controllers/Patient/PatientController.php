<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $appointments = DB::table('appointments')
                            ->join('users','appointments.doctor_id','=','users.id')
                            ->where('patient_id',Auth::user()->id)
                            ->get();
        return view('patient.home',compact('appointments'));
    }

    public function apply_for_doctor(request $request)
    {
        if(Auth::user()->role!=1)
            return view('patient.applyfordoctor');
        else
            return view('error.alreadydoctor');
    }

    public function doctor_application(request $request)
    {
        if(Auth::user()->role==1)
            return view('error.alreadydoctor');

        // Store and verify the doctor details
        $doctor = array(
                            'user_id' => Auth::user()->id,
                            'qualification' => $request->qualification
                        );
        $id = DB::table('doctor')->insertGetId($doctor);
        
        $user = DB::table('users')
                    ->where('id',Auth::user()->id)
                    ->update(['role'=>1]);

        // Temporarily Put on hold for verification if required

        return view('doctor.welcome');
    }

    public function book()
    {
        $doctors = DB::table('doctor')
                        ->join('users','users.id','=','doctor.user_id')
                        ->get();
        return view('patient.bookappointment',compact('doctors'));
    }

    public function book_appointment(Request $request)
    {
        // Verufy booking details if required.
        $booking = array(
                            'patient_id' => Auth::user()->id,
                            'doctor_id' => $request->id,
                            'status' => '0',
                            'details' => $request->details,
                            'appointment' => $request->datetime
                        );
        $id = DB::table('appointments')->insertGetId($booking);
        
        return redirect('/patient');
    }
}
