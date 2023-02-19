<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Site;
use App\Models\Turn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TurnController extends Controller
{

    public function index()
    {
        return view('admin.turns.index');
    }

    public function create()
    {

        $cities = City::pluck('name', 'id');
        $sites = Site::pluck('name', 'id');

        return view('admin.turns.create', compact('cities', 'sites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'site_id' => 'required',
        ]);

        $turn = Turn::create($request->all()+[
            'user_id' => Auth::user()->id,
            'local_ip' => $request->getClientIp(),
        ]);

        return redirect()->route('admin.turns.index', $turn)
                         ->with('info', 'Ha ingresado al turno con éxito');
    }

}
