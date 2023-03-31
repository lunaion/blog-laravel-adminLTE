<?php

namespace App\Exports;

use App\Models\Reinstallation;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReinstallationsExport implements FromView, ShouldAutoSize
{
    public function view() : View
    {
        return view('admin.reinstallations.partials.export', [
            'reinstallations' => Reinstallation::all()
        ]);
    }
}
