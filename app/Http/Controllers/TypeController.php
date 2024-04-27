<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'typeparent_id' => 'nullable|exists:types,id'
        ]);

        Type::create($validatedData);
        return redirect()->route('types.index');
    }


    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'typeparent_id' => 'nullable|exists:types,id'
        ]);

        $type->update($validatedData);
        return redirect()->route('types.index');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index');
    }
}
