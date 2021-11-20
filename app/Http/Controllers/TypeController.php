<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::paginate(10);
        $types = Type::query();
        if (request('term')) {
            $types->where('name', 'Like', '%' . request('term') . '%');
        }

        $types = $types->orderBy('id', 'DESC')->paginate(10);

        //dd($patients);
        return view('admin.type.index',compact('types'));

    }


    public function create()
    {
        return view('admin.type.create');

    }


    public function store(Request $request)
    {
        $data = $request->only('name');
        Type::create(['name'=>$data['name']]);
        return redirect()->route('types.index')->with('success','Added successful');

    }


    public function show(Type $type)
    {
        //
    }


    public function edit($id)
    {
        $type = Type::find($id);
        return view('admin.type.edit',compact('type'));

    }


    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $data = $request->only('name');
        $department = Type::find($id);
        $department->update($data);
        return redirect()->route('types.index')->with('success','Update successfully!');

    }


    public function destroy(Type $type)
    {
        //
    }
}
