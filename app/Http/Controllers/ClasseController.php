<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe; 
use App\Models\Estalishment;

class ClasseController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $classes = Classe::all(); 
        return view('classes.index', compact('classes'));
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        $estalishments = Estalishment::all(); // جلب جميع الـ Estalishments لعرضها في القائمة الـ select

        return view('classes.create', compact('estalishments'));
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'estalishment_id' => 'required|exists:estalishments,id',
        ]);

        Classe::create($validatedData); 
        return redirect()->route('classes.index');
    }

    /**
    * Display the specified resource.
    */
/**
* Display the specified resource.
*/


    

    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        $estalishments = Estalishment::all(); // جلب جميع الـ Estalishments لعرضها في القائمة الـ select

        return view('classes.edit', compact('classe', 'estalishments'));
    }


    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Classe $classe) // تأكد من استخدام النوع الصحيح للمتغير
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'estalishment_id' => 'required|exists:estalishments,id',
        ]);

        $classe->update($validatedData); // استخدم النموذج الصحيح هنا
        return redirect()->route('classes.index');
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Classe $classe) 
    {
        $classe->delete(); 
        return redirect()->route('classes.index');
    }
}
