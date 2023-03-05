<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SitesExport;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.sites.index')->only('index');
        $this->middleware('can:admin.sites.create')->only('create', 'store');
        $this->middleware('can:admin.sites.edit')->only('edit', 'update');
        $this->middleware('can:admin.sites.destroy')->only('destroy');
    }

    public function index()
    {
        $sites = Site::all();

        return view('admin.sites.index', compact('sites'));
    }

    public function create()
    {
        $cities = City::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('admin.sites.create', compact('cities', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'slug' => 'required|unique:sites',
            'address' => 'required|min:3|max:100',
            'phone' => 'required|numeric|digits_between:7,12',
            'email' => 'required|email',
            'city_id' => 'required',
            'user_id' => 'required',
        ]);

        $site = Site::create($request->all());

        return redirect()->route('admin.sites.edit', $site)
                         ->with('info', 'La sede se creó con éxito');
    }

    public function edit(Site $site)
    {
        $cities = City::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('admin.sites.edit', compact('site', 'cities', 'users'));
    }

    public function update(Request $request, Site $site)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'slug' => "required|unique:sites,slug,$site->id",
            'address' => 'required|min:3|max:100',
            'phone' => 'required|numeric|digits_between:7,12',
            'email' => 'required|email',
            'city_id' => 'required',
            'user_id' => 'required',
        ]);

        $site->update($request->all());

        return redirect()->route('admin.sites.edit', $site)
                         ->with('info', 'La sede se actualizó con éxito');
    }

    public function destroy(Site $site)
    {
        $site->delete();

        return redirect()->route('admin.sites.index', $site)
                        ->with('info', 'La sede se eliminó con éxito');
    }

    public function export(){
        return Excel::download(new SitesExport, 'Lista de sedes.xlsx');
    }
}
