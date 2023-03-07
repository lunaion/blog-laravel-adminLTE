<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reinstallation;
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
        return view('admin.reinstallations.create');
    }

    public function store(Request $request)
    {

        $request -> validate([
            'ticket' => 'required',
        ]);

        $reinstallation = Reinstallation::create($request->all()+[
            'tecnico_id' => Auth::user()->id,
        ]);

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
