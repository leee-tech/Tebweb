<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Drug;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{

    public function index()
    {
        $diseases = Disease::paginate(30);

        return view('admin.disease.index',compact('diseases'));
    }


    public function create()
    {
        return view('admin.disease.create');
    }

    public function store(Request $request)
    {
        $data = $request->only('name');
        Disease::create($data);
        return redirect()->route('diseases.index')->with('success','Added Disease successful');

    }

    public function show(Disease $disease)
    {
        //
    }


    public function edit($id)
    {
        $diseases = Disease::find($id);
        return view('admin.disease.edit',compact('diseases'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->only('name');
        $diseases = Disease::find($id);
        $diseases->update($data);
        return redirect()->route('diseases.index')->with('success','Update diseases successful');

    }


    public function destroy(Disease $disease)
    {
        $disease->delete();
        return redirect()->route('diseases.index')->with('success','Update diseases successful');

    }
}
