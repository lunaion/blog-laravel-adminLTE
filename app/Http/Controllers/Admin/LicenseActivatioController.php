<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LicenseActivation;
use Illuminate\Http\Request;

class LicenseActivatioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.licenseActivations.index')->only('index');
        $this->middleware('can:admin.licenseActivations.create')->only('create', 'store');
        $this->middleware('can:admin.licenseActivations.edit')->only('edit', 'update');
        $this->middleware('can:admin.licenseActivations.destroy')->only('destroy');
    }

    public function index()
    {
        $licenseActivations = LicenseActivation::all();
        return view('admin.licenseActivations.index', compact('licenseActivations'));
    }

    public function create()
    {
        return view('admin.licenseActivations.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => 'required|unique:license_activations',
        ]);

        $licenseActivation = LicenseActivation::create($request->all());

        return redirect()->route('admin.licenseActivations.edit', compact('licenseActivation'))
                            ->with('info', 'Se ha creado una activación de licencia con éxito');
    }

    public function edit(LicenseActivation $licenseActivation)
    {
        return view('admin.licenseActivations.edit', compact('licenseActivation'));
    }

    public function update(Request $request, LicenseActivation $licenseActivation)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => "required|unique:license_activations,slug,$licenseActivation->id",
        ]);

        $licenseActivation->update($request->all());

        return redirect()->route('admin.licenseActivations.edit', $licenseActivation)
                         ->with('info', 'Se ha actualizado una activación de licencia con éxito');
    }

    public function destroy(LicenseActivation $licenseActivation)
    {
        $licenseActivation->delete();

        return redirect()->route('admin.licenseActivations.index')
                         ->with('info', 'Se ha eliminado una activación de licencia con éxito');
    }
}
