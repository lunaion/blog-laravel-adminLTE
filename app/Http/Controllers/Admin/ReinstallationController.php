<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Backup;
use App\Models\City;
use App\Models\Position;
use App\Models\Reinstallation;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReinstallationController extends Controller
{
    public function index()
    {
        return view('admin.reinstallations.index');
    }

    public function create()
    {

        $areas = Area::pluck('name', 'id');
        $positions = Position::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $sites = Site::pluck('name', 'id');
        $backups = Backup::all();
        
        return view('admin.reinstallations.create', compact('areas', 'positions', 'cities', 'sites', 'backups'));
    }

    public function store(Request $request)
    {

        $request -> validate([
            'ticket' => 'required',
        ]);

        $reinstallation = Reinstallation::create($request->all()+[
            'tecnico_id' => Auth::user()->id,
        ]);

        if ($request->backups) {
            $reinstallation->backups()->attach($request->backups);
        }

        return redirect()->route('admin.reinstallations.edit', compact('reinstallation'));
    }

    public function show(Reinstallation $reinstallation)
    {
        //
    }

    public function edit(Reinstallation $reinstallation)
    {
        //
    }

    public function update(Request $request, Reinstallation $reinstallation)
    {
        //
    }

    public function destroy(Reinstallation $reinstallation)
    {
        //
    }
}
