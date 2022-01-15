<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Department;
use App\Models\Hospital;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function DoctorProfileShow(){
        return view('doctor.doctor-show');
    }
    public function PatientEdit(){


        return view('patient.edit-profile');
    }
    public function updatePatient(Request $request)
    {
        $inputs = $request->all();
        auth()->user()->update([
            "email" => $inputs["email"],
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'gender'=>$inputs['gender'],
            'age' => $inputs['age'],
            'phone' => $inputs['phone'],
            'description'=>$inputs['description'],
            'address' => $inputs['address'] ?? null
        ]);
        return redirect()->route('patient.profile.edit')->with('success','Edit successful');
    }
    public function AdminEdit(){


        return view('admin.edit-profile');
    }
    public function DoctorProfileEdit(){
        $departments = Department::all();
        $hospitals = Hospital::all();

        return view('doctor.edit-profile',compact('departments','hospitals'));
    }
    public function updateAdmin(Request $request)
    {
        $inputs = $request->all();
        auth()->user()->update([
            "email" => $inputs["email"],
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'gender'=>$inputs['gender'],
            'age' => $inputs['age'],
            'phone' => $inputs['phone'],
            'description'=>$inputs['description'],
            'address' => $inputs['address'] ?? null
        ]);
        return redirect()->route('admin.profile.edit')->with('success','Edit successful');
    }
    public function update(Request $request)
    {
        $inputs = $request->all();
        auth()->user()->update([
            "email" => $inputs["email"],
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'gender'=>$inputs['gender'],
            'age' => $inputs['age'],
            'phone' => $inputs['phone'],
            'department_id'=>$inputs['department_id'],
            'hospital_id' => $inputs['hospital_id'],
            'description'=>$inputs['description'],
            'address' => $inputs['address'] ?? null
        ]);
        return redirect()->route('doctor.profile.show')->with('success','Edit successful');
    }
    public function generateReport(Request $request){
        if($request->status == 'today'){
            $data = Booking::with(['doctor','user'])->whereDay('created_at', date('d'))->get();

        }else if($request->status=='month'){
            $data = Booking::with(['doctor','user'])->whereMonth('created_at', date('m'))->get();
        }
        view()->share('booking',$data);
        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('pdf-view.pdf');
    }

}
