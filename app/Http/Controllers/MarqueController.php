<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index()
    {
        $marques = Marque::all();
        return view('marques.index', compact('marques'));
    }

    public function create()
    {
        return view('marques.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Marque::create($validatedData);
        return redirect()->route('marques.index');
    }


    public function edit($id)
    {
        $marque = Marque::findOrFail($id);
        return view('marques.edit', compact('marque'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
    
        $marque = Marque::findOrFail($id);
        $marque->update($validatedData);
    
        return redirect()->route('marques.index')->with('success', 'Marque updated successfully');
    }
    
    public function destroy($id)
    {
        $marque = Marque::findOrFail($id);
        $marque->delete();
    
        return redirect()->route('marques.index')->with('success', 'Marque deleted successfully');
    }
    }