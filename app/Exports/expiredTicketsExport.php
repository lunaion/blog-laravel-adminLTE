<?php

namespace App\Exports;

use App\Models\ExpiredTicket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class expiredTicketsExport implements FromView, ShouldAutoSize
{
    public function view() : View
    {
        return view('admin.expiredTickets.partials.export', [
            'expiredTickets' => ExpiredTicket::all()
        ]);
    }
}
