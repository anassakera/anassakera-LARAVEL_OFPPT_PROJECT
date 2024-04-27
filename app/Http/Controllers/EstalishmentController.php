<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estalishment;

class EstalishmentController extends Controller
{
    public function index()
    {
        $estalishments = Estalishment::all();
        return view('estalishments.index', compact('estalishments'));
    }

    public function create()
    {
        return view('estalishments.create');
    }

    public function store(Request $request)
    {
        Estalishment::create($request->all());
        return redirect()->route('estalishments.index');
    }

    public function edit(Estalishment $estalishment)
    {
        return view('estalishments.edit', compact('estalishment'));
    }

    public function update(Request $request, Estalishment $estalishment)
    {
        $estalishment->update($request->all());
        return redirect()->route('estalishments.index');
    }

    public function destroy(Estalishment $estalishment)
    {
        $estalishment->delete();
        return redirect()->route('estalishments.index');
    }
}