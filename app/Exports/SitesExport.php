<?php

namespace App\Exports;

use App\Models\Site;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SitesExport implements FromView, ShouldAutoSize
{
    public function view() : View
    {
        return view('admin.sites.partials.export', [
            'sites' => Site::all()
        ]);
    }
}
