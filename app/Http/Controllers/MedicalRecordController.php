<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    function getSearchMedicalRecord(Request $request){
        if($request->ssn){
            $patients = User::role('patient')->where('ssn',$request->ssn)->get();
            return view('doctor.patient.search-medical-record',compact('patients'));

        }
        return view('doctor.patient.search-medical-record');
    }
    function getAppointmentByPatient(Request $request,User $user){
        if($request->own){
            $appointments = Booking::with(['doctor','user'])->where('user_id',$user->id)->where('doctor_id',auth()->id())->get();
            return view('doctor.patient.appointment',compact('appointments'));
        }
        $appointments = Booking::with(['doctor','user'])->where('user_id',$user->id)->get();
        return view('doctor.patient.appointment',compact('appointments'));
    }
    function getAppointmentByPrescription(Request $request,User $user){
        if($request->own) {
            $prescriptions = Prescription::with(['doctor','user'])->where('user_id',$user->id)->where('doctor_id',auth()->id())->get();
            return view('doctor.patient.prescription',compact('prescriptions'));

        }
            $prescriptions = Prescription::with(['doctor','user'])->where('user_id',$user->id)->get();
        return view('doctor.patient.prescription',compact('prescriptions'));
    }
}
