<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::paginate(30);
        //dd($patients);
        return view('admin.hospital.index',compact('hospitals'));

    }


    public function create()
    {
        return view('admin.hospital.create');

    }


    public function store(Request $request)
    {
        $data = $request->only('name');
        Hospital::create(['name'=>$data['name']]);
        return redirect()->route('hospitals.index')->with('success','Added successful');

    }


    public function show(Hospital $hospital)
    {
        //
    }


    public function edit($id)
    {
        $hospital = Hospital::find($id);
        return view('admin.hospital.edit',compact('hospital'));

    }


    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $data = $request->only('name');
        $department = Hospital::find($id);
        $department->update($data);
        return redirect()->route('hospitals.index')->with('success','Update successfully!');

    }


    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->route('hospitals.index')->with('success','Delete successfully!');

    }
}
