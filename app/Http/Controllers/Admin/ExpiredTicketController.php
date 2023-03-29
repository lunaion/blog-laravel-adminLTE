<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\ExpiredTicket;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpiredTicketController extends Controller
{

    public function index()
    {
        return view('admin.expiredTickets.index');
    }

    public function create()
    {
        $area_solucion = [
            'Sí' => 'Sí',
            'No' => 'No',
        ];

        $users = User::pluck('name', 'id');
        $sites = Site::pluck('name', 'id');
        $areas = Area::pluck('name', 'id');
        
        return view('admin.expiredTickets.create', compact('area_solucion', 'users', 'sites', 'areas'));
    }

    public function store(Request $request)
    {

        $request -> validate([
            'ticket' => 'required|unique:expired_tickets',
            'fecha_llegada' => 'required',
            'asignado_por' => 'required',
            'site_id' => 'required',
            'area_asignadora' => 'required',
            'tiempo_vencimiento' => 'required',
            'detalles' => 'required',
            'solucion' => 'required',
            'area_solucion' => 'required',
        ]);

        $expiredTicket = ExpiredTicket::create($request->all()+[
            'tecnico_sede' => Auth::user()->id
        ]);

        return redirect()->route('admin.expiredTickets.edit', compact('expiredTicket'))
                            ->with('info', 'Se agrego con éxito un ticket vencido');
    }

    public function show(ExpiredTicket $expiredTicket)
    {
        return view('admin.expiredTickets.show');
    }

    public function edit(ExpiredTicket $expiredTicket)
    {
        $area_solucion = [
            'Si' => 'Sí',
            'No' => 'No',
        ];

        $users = User::pluck('name', 'id');
        $sites = Site::pluck('name', 'id');
        $areas = Area::pluck('name', 'id');
        
        return view('admin.expiredTickets.edit', compact('expiredTicket', 'area_solucion', 'users', 'sites', 'areas'));
    }

    public function update(Request $request, ExpiredTicket $expiredTicket)
    {

        $request -> validate([
            'ticket' => "required|unique:expired_tickets,ticket,$expiredTicket->id",
            'fecha_llegada' => 'required',
            'asignado_por' => 'required',
            'site_id' => 'required',
            'area_asignadora' => 'required',
            'tiempo_vencimiento' => 'required',
            'detalles' => 'required',
            'solucion' => 'required',
            'area_solucion' => 'required',
        ]);

        $expiredTicket->update($request->all());

        return redirect()->route('admin.expiredTickets.edit', $expiredTicket)
                            ->with('info', 'Se actualizó con éxito un ticket vencido');

    }

    public function destroy(ExpiredTicket $expiredTicket)
    {

        $expiredTicket->delete();

        return redirect()->route('admin.expiredTickets.index', $expiredTicket)
                            ->with('info', 'Se eliminó con éxito el ticket vencido');
    }
}
