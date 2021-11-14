<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::paginate(10);
        //dd($patients);
        return view('admin.department.index',compact('departments'));

    }


    public function create()
    {
        return view('admin.department.create');

    }


    public function store(Request $request)
    {
        $data = $request->only('name');
        Department::create(['name'=>$data['name']]);
        return redirect()->route('departments.index')->with('success','Added successful');

    }


    public function show(Department $department)
    {
        //
    }


    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit',compact('department'));

    }


    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $data = $request->only('name');
        $department = Department::find($id);
        $department->update($data);
        return redirect()->route('departments.index')->with('success','Update successfully!');

    }


    public function destroy(Department $department)
    {
        //
    }
}