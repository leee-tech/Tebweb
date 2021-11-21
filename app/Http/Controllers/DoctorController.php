<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with(['user','department'])->paginate(10);
        return view('admin.doctor.index',compact('doctors'));
    }


    public function create()
    {
        $departments = Department::pluck('name', 'id');
        return view('admin.doctor.create',compact('departments'));
    }


    public function store(Request $request)
    {
        $data = $request->only(
            'email',
            'first_name',
            'last_name',
            'password',
            'department_id',
            'position'
        );
        $id = DB::table('users')->insertGetId([
            "email" => $data["email"],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            "password" => Hash::make($data['password']),
        ]);
        DB::table('doctors')->insertOrIgnore([
            "user_id" => $id,
            'position'=>$data['position'],
            'department_id'=>$data['department_id'],
            "created_at" =>  Carbon::now(),
        ]);
        $user = User::find($id);
        $user->assignRole('doctor');
        return redirect()->route('doctors.index')->with('success','Added successful');

    }


    public function show(Doctor $doctor)
    {
        //
    }


    public function edit($id)
    {
        $doctor = Doctor::find($id)->load(['user']);
        $departments = Department::pluck('name', 'id');
        return view('admin.doctor.edit',compact('departments','doctor'));

    }


    public function update(Request $request, $id)
    {
        $request->validate(['email' => 'required|email']);
        $data = $request->only(
            'email',
            'first_name',
            'last_name',
            'password',
            'department_id',
            'position'
        );
        $doctor = Doctor::find($id)->load(['user']);
        $user = User::find($doctor->user->id);
        $doctor->update(
            ['department_id'=>$data['department_id'],
                'position'=>$data['position']]);
        $user->update(["email" => $data["email"],
            'first_name' => $data['first_name'],
            'last_name' => $data['first_name'],
            "password" => Hash::make($data['password'])]);
        return redirect()->route('doctors.index')->with('success','Added successful');

    }


    public function destroy(Doctor $doctor)
    {
        //
    }
}
