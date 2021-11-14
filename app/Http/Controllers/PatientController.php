<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::with('user')->paginate(10);
        //dd($patients);
        return view('admin.patient.index',compact('patients'));
//        return $patient;
    }


    public function create()
    {
        return view('admin.patient.create');
    }


    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $data = $request->only(
            'email',
            'first_name',
            'last_name',
            'password',
            'age',
            'address'
        );
        $id = DB::table('users')->insertGetId([
            "email" => $data["email"],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            "password" => Hash::make($data['password']),
        ]);
        DB::table('patients')->insertOrIgnore([
            "user_id" => $id,
            'age'=>$data['age'],
            'address'=>$data['address'],
            "created_at" =>  Carbon::now(),
        ]);
        $user = User::find($id);
        $user->assignRole('patient');


        return redirect()->route('patients.index')->with('success','Added successful');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {

    }


    public function edit($id)
    {
        $patient = Patient::find($id)->load(['user']);
        return view('admin.patient.edit',compact('patient'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(['email' => 'required|email']);
        $data = $request->only(
            'email',
            'first_name',
            'last_name',
            'password',
            'age',
            'address'
        );
        $patient = Patient::find($id)->load(['user']);
        $user = User::find($patient->user->id);
        $patient->update(
            ['age'=>$data['age'],
                'address'=>$data['address']]);
        $user->update(["email" => $data["email"],
            'first_name' => $data['first_name'],
            'last_name' => $data['first_name'],
            "password" => Hash::make($data['password'])]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
