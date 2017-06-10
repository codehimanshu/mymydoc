<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Http\Requests;
use DB;
use Carbon;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('doctorauth');
    }

    public function index()
    {
        $appointments = DB::table('appointments')
                                ->join('users','users.id','=','appointments.patient_id')
                                ->select('appointments.*','users.name')
                                ->where('doctor_id',Auth::user()->id)
                                ->where('appointment','>=',Carbon\Carbon::now())
                                ->get();
        return view('doctor.home',compact('appointments'));
    }

    public function accept(Request $request)
    {
        DB::table('appointments')->where('id',$request->id)->update(['status'=>1]);
        return redirect('/doctor');
    }

    public function reject(Request $request)
    {
        DB::table('appointments')->where('id',$request->id)->update(['status'=>2]);
        return redirect('/doctor');
    }
}
