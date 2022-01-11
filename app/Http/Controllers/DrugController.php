<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    //get all information drugs
    public function index()
    {
        $mohammad = Drug::paginate(10);
        return view('admin.drug.index',compact('mohammad'));
    }


    public function create()
    {
        return view('admin.drug.create');
    }

    public function store(Request $request)
    {
        $data = $request->only('name');
        Drug::create($data);
        return redirect()->route('drugs.index')->with('success','Added Drug successful');

    }


    public function show(Drug $drug)
    {
        //
    }


    public function edit($id)
    {
        $drug = Drug::find($id);
        return view('admin.drug.edit',compact('drug'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->only('name');
        $drug = Drug::find($id);
        $drug->update($data);
        return redirect()->route('drugs.index')->with('success','Update Drug successful');

    }


    public function destroy(Drug $drug)
    {
        $drug->delete();
        return redirect()->route('drugs.index')->with('success','Delete Drug successful');
    }
}
