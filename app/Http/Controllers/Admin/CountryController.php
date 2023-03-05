<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.countries.index')->only('index');
        $this->middleware('can:admin.countries.create')->only('create', 'store');
        $this->middleware('can:admin.countries.edit')->only('edit', 'update');
        $this->middleware('can:admin.countries.destroy')->only('destroy');
    }
  
    public function index()
    {
        $countries = Country::all();
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => 'required|unique:countries',
        ]);

        $country = Country::create($request->all());

        return redirect()->route('admin.countries.edit', compact('country'))
                            ->with('info', 'El país se creó con éxito');
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => "required|unique:countries,slug,$country->id",
        ]);

        $country->update($request->all());

        return redirect()->route('admin.countries.edit', $country)
                         ->with('info', 'El país se actualizó con éxito');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('admin.countries.index')
                         ->with('info', 'El país se eliminó con éxito');
    }
}
