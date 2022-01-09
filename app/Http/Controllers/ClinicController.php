<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{

    public function index()
    {
        $clinics = Clinic::where('doctor_id',auth()->id())->paginate(100);

        return view('doctor.clinic.index',compact('clinics'));

    }


    public function create()
    {
        return view('doctor.clinic.create');

    }


    public function store(Request $request)
    {
        $data = $request->only('name','location_name');
        $data['doctor_id'] = auth()->id();
        Clinic::create($data);
        return redirect()->route('clinics.index')->with('success','Added clinics successful');

    }


    public function show(Clinic $clinic)
    {
        //
    }


    public function edit($id)
    {
        $clinics = Clinic::find($id);
        return view('doctor.clinic.edit',compact('clinics'));

    }


    public function update(Request $request, $id)
    {
        $data = $request->only('name','location_name');
        $clinics = Clinic::find($id);
        $clinics->update($data);
        return redirect()->route('clinics.index')->with('success','Update clinics successful');

    }

    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        return redirect()->route('clinics.index')->with('success','Delete clinics successful');

    }
}
