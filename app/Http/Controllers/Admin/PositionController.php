<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.positions.index')->only('index');
        $this->middleware('can:admin.positions.create')->only('create', 'store');
        $this->middleware('can:admin.positions.edit')->only('edit', 'update');
        $this->middleware('can:admin.positions.destroy')->only('destroy');
    }

    public function index()
    {
        $positions = Position::all();
        return view('admin.positions.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.positions.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => 'required|unique:positions',
        ]);

        $position = Position::create($request->all());

        return redirect()->route('admin.positions.edit', compact('position'))
                            ->with('info', 'El cargo se creó con éxito');
    }

    public function edit(Position $position)
    {
        return view('admin.positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => "required|unique:positions,slug,$position->id",
        ]);

        $position->update($request->all());

        return redirect()->route('admin.positions.edit', $position)
                         ->with('info', 'El cargo se actualizó con éxito');
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('admin.positions.index')
                         ->with('info', 'El cargo se eliminó con éxito');
    }
}
