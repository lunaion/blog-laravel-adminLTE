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

        $status = [
            'Entrada' => 'Marcar entrada',
            'Salida' => 'Marcar salida',
        ];

        $cities = City::pluck('name', 'id');
        $sites = Site::pluck('name', 'id');

        return view('admin.turns.create', compact('cities', 'sites', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'status' => 'required',
            'city_id' => 'required',
            'site_id' => 'required',
            
        ]);

        // Verificar si ya existe un registro de entrada para el usuario actual en la fecha actual
        $entry = Turn::where('user_id', auth()->user()->id)
                    ->where('date', Carbon::now()->format('d-m-Y'))
                    ->where('status', 'Entrada')
                    ->first();

        if ($request->status == 'Entrada') {

            if ($entry) {
                return redirect()->route('admin.turns.index')
                                ->with('warning', 'Ya marcaste la entrada por el día de hoy, por favor intenta de nuevo mañana.');
            } else {
                $turn = Turn::create($request->all()+[
                    'user_id' => Auth::user()->id,
                    'local_ip' => $request->getClientIp(),
                    'date' => Carbon::now()->format('d-m-Y'),
                    'time' => Carbon::now()->toTimeString(),
                ]);

                return redirect()->route('admin.turns.index', $turn)
                                ->with('info', 'Has ingresado al turno con éxito');
            }

        } elseif ($request->status == 'Salida') {
            if ($entry) {
                $turno = Turn::where('user_id', auth()->user()->id)
                            ->where('date', Carbon::now()->format('d-m-Y'))
                            ->where('status', $request->status)
                            ->first();
                
                if ($turno) {
                    return redirect()->route('admin.turns.index')
                                    ->with('warning', 'Ya marcaste la salida por el día de hoy, por favor intenta de nuevo mañana.');
                } else {
                    $turn = Turn::create($request->all()+[
                        'user_id' => Auth::user()->id,
                        'local_ip' => $request->getClientIp(),
                        'date' => Carbon::now()->format('d-m-Y'),
                        'time' => Carbon::now()->toTimeString(),
                    ]);

                    return redirect()->route('admin.turns.index', $turn)
                                    ->with('info', 'Ha salido del turno con éxito');
                }
            } else {
                return redirect()->route('admin.turns.index')
                                ->with('warning', 'Debe marcar la entrada primero.');
            }

        }
        
    }

    public function export(){
        return Excel::download(new TurnsExport, 'Registro de ingreso a turnos.xlsx');
    }

}
