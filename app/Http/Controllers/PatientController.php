<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index()
    {
        $users = User::role('patient')->paginate(10);
        return view('admin.users.view_patient',compact('users'));
    }


    public function create()
    {
        $departments = Department::all();
        return view('admin.users.add_patient',compact('departments'));
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $register_data = $request->all();
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);
        $id = DB::table('users')->insertGetId([
            "email" => $inputs["email"],
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            "password" => Hash::make($register_data['password']),
            'gender'=>$inputs['gender'],
            'age' => $inputs['age'],
            'phone' => $inputs['phone'],
            'bdate' => $inputs['bdate'] ?? null,

            'address' => $inputs['address'] ?? null
        ]);
        $user = User::find($id);
        $user->assignRole('patient');
        return redirect()->route('patients.index')->with('success','Added successful');
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $doctor = User::find($id);
        return view('admin.users.edit_patient',compact('doctor'));

    }


    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $user = User::find($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update([
            "email" => $inputs["email"],
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'gender'=>$inputs['gender'],
            'age' => $inputs['age'],
            'phone' => $inputs['phone'],
            'bdate' => $inputs['bdate'] ?? null,

            'address' => $inputs['address'] ?? null,
        ]);
        return redirect()->route('patients.index')->with('success','Edit successful');

    }


    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        $hospital->delete();
        return redirect()->route('patients.index')->with('success','Delete successful');

    }
}
