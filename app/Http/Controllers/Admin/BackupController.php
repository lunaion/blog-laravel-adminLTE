<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.backups.index')->only('index');
        $this->middleware('can:admin.backups.create')->only('create', 'store');
        $this->middleware('can:admin.backups.edit')->only('edit', 'update');
        $this->middleware('can:admin.backups.destroy')->only('destroy');
    }

    public function index()
    {
        $backups = Backup::all();
        return view('admin.backups.index', compact('backups'));
    }

    public function create()
    {
        return view('admin.backups.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => 'required|unique:backups',
        ]);

        $backup = Backup::create($request->all());

        return redirect()->route('admin.backups.edit', compact('backup'))
                            ->with('info', 'El backup se creó con éxito');
    }

    public function edit(Backup $backup)
    {
        return view('admin.backups.edit', compact('backup'));
    }

    public function update(Request $request, Backup $backup)
    {
        $request -> validate([
            'name' => 'required',
            'slug' => "required|unique:backups,slug,$backup->id",
        ]);

        $backup->update($request->all());

        return redirect()->route('admin.backups.edit', $backup)
                         ->with('info', 'El backup se actualizó con éxito');
    }

    public function destroy(Backup $backup)
    {
        $backup->delete();

        return redirect()->route('admin.backups.index')
                         ->with('info', 'El backup se eliminó con éxito');
    }
}
