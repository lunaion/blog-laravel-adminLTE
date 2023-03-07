<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralValidation;
use Illuminate\Http\Request;

class GeneralValidationController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.generalValidations.index')->only('index');
        $this->middleware('can:admin.generalValidations.create')->only('create', 'store');
        $this->middleware('can:admin.generalValidations.edit')->only('edit', 'update');
        $this->middleware('can:admin.generalValidations.destroy')->only('destroy');
    }

    public function index()
    {
        $generalValidations = GeneralValidation::all();
        return view('admin.generalValidations.index', compact('generalValidations'));
    }

    public function create()
    {
        return view('admin.generalValidations.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => 'required|unique:general_validations',
        ]);

        $generalValidation = GeneralValidation::create($request->all());

        return redirect()->route('admin.generalValidations.edit', compact('generalValidation'))
                            ->with('info', 'Se ha creado una validación general con éxito');
    }

    public function edit(GeneralValidation $generalValidation)
    {
        return view('admin.generalValidations.edit', compact('generalValidation'));
    }

    public function update(Request $request, GeneralValidation $generalValidation)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => "required|unique:general_validations,slug,$generalValidation->id",
        ]);

        $generalValidation->update($request->all());

        return redirect()->route('admin.generalValidations.edit', $generalValidation)
                         ->with('info', 'Se ha actualizado una validación general con éxito');
    }

    public function destroy(GeneralValidation $generalValidation)
    {
        $generalValidation->delete();

        return redirect()->route('admin.generalValidations.index')
                         ->with('info', 'Se ha eliminado una validación general con éxito');
    }
}
