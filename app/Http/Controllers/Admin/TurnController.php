<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TurnsExport;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Site;
use App\Models\Turn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TurnController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.turns.index')->only('index');
        $this->middleware('can:admin.turns.create')->only('create', 'store');
    }

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
            'date' => Carbon::now()->toDateString(),
            'time' => Carbon::now()->toTimeString(),
        ]);

        return redirect()->route('admin.turns.index', $turn)
                         ->with('info', 'Ha ingresado al turno con éxito');
    }

    public function export(){
        return Excel::download(new TurnsExport, 'Registro de ingreso a turnos.xlsx');
    }

}
