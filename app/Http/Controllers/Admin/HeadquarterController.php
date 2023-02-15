<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Headquarter;
use App\Models\User;
use Illuminate\Http\Request;

class HeadquarterController extends Controller
{

    public function index()
    {

        $headquarters = Headquarter::all();

        return view('admin.headquarters.index', compact('headquarters'));

    }

    public function create()
    {

        $cities = City::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('admin.headquarters.create', compact('cities', 'users'));

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:100',
            'slug' => 'required|unique:headquarters',
            'address' => 'required|min:3|max:100',
            'phone' => 'required|numeric|digits_between:7,12',
            'email' => 'required|email',
            'city_id' => 'required',
            'user_id' => 'required',
        ]);

        $headquarter = Headquarter::create($request->all());

        return redirect()->route('admin.headquarters.edit', $headquarter)
                         ->with('info', 'La sede se creó con éxito');

    }

    public function edit(Headquarter $headquarters)
    {

        $cities = City::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('admin.headquarters.edit', compact('headquarters', 'cities', 'users'));

    }

    public function update(Request $request, Headquarter $headquarters)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'slug' => "required|unique:headquarters,slug,$headquarters->id",
            'address' => 'required|min:3|max:100',
            'phone' => 'required|numeric|digits_between:7,12',
            'email' => 'required|email',
            'city_id' => 'required',
            'user_id' => 'required',
        ]);

        $headquarters->update($request->all());

        return redirect()->route('admin.headquarters.edit', $headquarters)
                         ->with('info', 'La sede se actualizó con éxito');
    }

    public function destroy(Headquarter $headquarters)
    {
        $headquarters->delete();

        return redirect()->route('admin.headquarters.index', $headquarters)
                        ->with('info', 'La sede se eliminó con éxito');
    }
}
