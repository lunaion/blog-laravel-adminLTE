<?php

namespace App\Exports;

use App\Models\Turn;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TurnsExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('admin.turns.partials.export', [
            'turns' => Turn::all()
        ]);
    }
}
