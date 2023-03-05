<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{   

    public function __construct()
    {
        $this->middleware('can:admin.areas.index')->only('index');
        $this->middleware('can:admin.areas.create')->only('create', 'store');
        $this->middleware('can:admin.areas.edit')->only('edit', 'update');
        $this->middleware('can:admin.areas.destroy')->only('destroy');
    }

    public function index()
    {
        $areas = Area::all();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => 'required|unique:areas',
        ]);

        $area = Area::create($request->all());

        return redirect()->route('admin.areas.edit', compact('area'))
                            ->with('info', 'El área se creó con éxito');
    }

    public function edit(Area $area)
    {
        return view('admin.areas.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => "required|unique:areas,slug,$area->id",
        ]);

        $area->update($request->all());

        return redirect()->route('admin.areas.edit', $area)
                         ->with('info', 'El área se actualizó con éxito');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('admin.areas.index')
                         ->with('info', 'El área se eliminó con éxito');
    }
}
