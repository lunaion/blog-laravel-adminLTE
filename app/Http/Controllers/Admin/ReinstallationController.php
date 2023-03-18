<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Backup;
use App\Models\City;
use App\Models\GeneralValidation;
use App\Models\LicenseActivation;
use App\Models\Position;
use App\Models\Reinstallation;
use App\Models\Site;
use App\Models\User;
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
        $licenseActivations = LicenseActivation::all();
        $generalValidations = GeneralValidation::all();
        
        return view('admin.reinstallations.create', compact('areas', 'positions', 'cities', 'sites', 'backups', 'licenseActivations', 'generalValidations'));
    }

    public function store(Request $request)
    {

        $request -> validate([
            'ticket' => 'required',
            'area_id' => 'required',
            'position_id' => 'required',
            'city_id' => 'required',
            'site_id' => 'required',
            'location_details' => 'required',
            'machines' => 'required',
            'backups' => 'required',
            'backups_observations' => 'required',
            'validations_software' => 'required',
            'validations_observations' => 'required',
            'licenseActivations' => 'required',
            'generalValidations' => 'required',
            'general_observation' => 'required',
        ]);

        $user = User::where('document', $request->input('document'))->firstOrFail();

        $reinstallation = Reinstallation::create($request->all()+[
            'tecnico_id' => Auth::user()->id,
            'user_id' => $user->id,
        ]);

        if ($request->backups) {
            $reinstallation->backups()->attach($request->backups);
        }

        if ($request->licenseActivations) {
            $reinstallation->licenseActivations()->attach($request->licenseActivations);
        }

        if ($request->generalValidations) {
            $reinstallation->generalValidations()->attach($request->generalValidations);
        }

        return redirect()->route('admin.reinstallations.edit', compact('reinstallation'));

    }

    public function show(Reinstallation $reinstallation)
    {
        // 
    }

    public function edit(Reinstallation $reinstallation)
    {
        $areas = Area::pluck('name', 'id');
        $positions = Position::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $sites = Site::pluck('name', 'id');
        $backups = Backup::all();
        $licenseActivations = LicenseActivation::all();
        $generalValidations = GeneralValidation::all();

        // Obtener información adicional del usuario
        $user = User::findOrFail($reinstallation->user_id);

        return view('admin.reinstallations.edit', compact('reinstallation', 'areas', 'positions', 'cities', 'sites', 'backups', 'licenseActivations', 'generalValidations', 'user')); 
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
