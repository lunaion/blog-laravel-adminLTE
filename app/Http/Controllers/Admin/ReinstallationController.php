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
            'ticket' => 'required|unique:reinstallations',
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

        $user = User::where('document', $request->document)->firstOrFail();

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

        return redirect()->route('admin.reinstallations.edit', compact('reinstallation'))->with('info', 'La reinstalación se creó con éxito');

    }

    public function show(Reinstallation $reinstallation)
    {
        $areas = Area::pluck('name', 'id');
        $positions = Position::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $sites = Site::pluck('name', 'id');
        $backups = Backup::all();
        $licenseActivations = LicenseActivation::all();
        $generalValidations = GeneralValidation::all();

        return view('admin.reinstallations.show', compact('reinstallation', 'areas', 'positions', 'cities', 'sites', 'backups', 'licenseActivations', 'generalValidations')); 
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

        return view('admin.reinstallations.edit', compact('reinstallation', 'areas', 'positions', 'cities', 'sites', 'backups', 'licenseActivations', 'generalValidations')); 
    }

    public function update(Request $request, Reinstallation $reinstallation)
    {

        $request -> validate([
            'ticket' => "required|unique:reinstallations,ticket,$reinstallation->id",
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

        $reinstallation->update($request->all());

        if ($request->backups) {
            $reinstallation->backups()->sync($request->backups);
        }

        if ($request->licenseActivations) {
            $reinstallation->licenseActivations()->sync($request->licenseActivations);
        }

        if ($request->generalValidations) {
            $reinstallation->generalValidations()->sync($request->generalValidations);
        }

        return redirect()->route('admin.reinstallations.edit', $reinstallation)
                            ->with('info', 'La reinstalación se actualizó con éxito');

    }

    public function destroy(Reinstallation $reinstallation)
    {
        $reinstallation->delete();

        return redirect()->route('admin.reinstallations.index', $reinstallation)
                        ->with('info', 'La reinstalación se eliminó con éxito');
    }
}
