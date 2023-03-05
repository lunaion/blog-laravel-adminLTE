<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.cities.index')->only('index');
        $this->middleware('can:admin.cities.create')->only('create', 'store');
        $this->middleware('can:admin.cities.edit')->only('edit', 'update');
        $this->middleware('can:admin.cities.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.cities.index');
    }

    public function create()
    {

        $countries = Country::pluck('name', 'id');

        return view('admin.cities.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:cities',
            'country_id' => 'required',
        ]);

        $city = City::create($request->all());

        return redirect()->route('admin.cities.edit', compact('city'))
                         ->with('info', 'La ciudad se creó con éxito');
    }

    public function edit(City $city)
    {

        $countries = Country::pluck('name', 'id');

        return view('admin.cities.edit', compact('city', 'countries'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:cities,slug,$city->id",
            'countries' => 'required',
        ]);

        $city->update($request->all());

        return redirect()->route('admin.cities.edit', compact('city'))
                         ->with('info', 'La ciudad se actualizó con éxito');

    }

    public function destroy(City $city)
    {

        $city->delete();

        return redirect()->route('admin.cities.index', $city)
                        ->with('info', 'La ciudad se eliminó con éxito');
    }
}
