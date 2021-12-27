<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::role('doctor')->with(['hospital','department'])->paginate(10);
        return view('admin.users.view_doctor',compact('users'));
    }


    public function create()
    {
        $departments = Department::all();
        $hospitals = Hospital::all();

        return view('admin.users.add_doctor',compact('departments','hospitals'));
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $register_data = $request->all();
        $id = DB::table('users')->insertGetId([
            "email" => $inputs["email"],
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            "password" => Hash::make($register_data['password']),
            'gender'=>$inputs['gender'],
            'age' => $inputs['age'],
            'phone' => $inputs['phone'],
            'department_id'=>$inputs['department_id'],
            'address' => $inputs['address'] ?? null,
            'hospital_id' => $inputs['hospital_id'],

        ]);
        $user = User::find($id);
        $user->assignRole('doctor');
        return redirect()->route('users.index')->with('success','Added successful');
    }





    public function edit($id)
    {
        $doctor = User::find($id);
        $departments = Department::all();
        $hospitals = Hospital::all();

        $get_department_id = $doctor->department_id;
        $get_hospital_id = $doctor->hospital_id;

        return view('admin.users.edit_doctor',compact('doctor',
            'departments',
            'get_department_id','hospitals','get_hospital_id'));

    }


    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $user = User::find($id);
        $user->update([
            "email" => $inputs["email"],
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'gender'=>$inputs['gender'],
            'age' => $inputs['age'],
            'phone' => $inputs['phone'],
            'department_id'=>$inputs['department_id'],
            'hospital_id' => $inputs['hospital_id'],

            'address' => $inputs['address'] ?? null
        ]);
        return redirect()->route('users.index')->with('success','Edit successful');

    }


    public function destroy($id)
    {

    }
}
