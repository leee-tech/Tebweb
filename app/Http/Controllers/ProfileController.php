<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Hospital;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function DoctorProfileShow(){
        return view('doctor.doctor-show');
    }
    public function DoctorProfileEdit(){
        $departments = Department::all();
        $hospitals = Hospital::all();

        return view('doctor.edit-profile',compact('departments','hospitals'));
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
}
