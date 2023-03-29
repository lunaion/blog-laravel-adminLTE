<?php

namespace App\Http\Livewire\Admin;

use App\Models\ExpiredTicket;
use Livewire\Component;
use Livewire\WithPagination;

class ExpiredTicketsIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {

        $expiredTickets = ExpiredTicket::orWhereHas('asignado', function($q) {
                                            $q->where('name', 'LIKE', '%' . $this->search .'%');
                                        })->orWhereHas('tecnico', function($q) {
                                            $q->where('name', 'LIKE', '%' . $this->search .'%');
                                        })->orWhereHas('site', function($q) {
                                            $q->where('name', 'LIKE', '%' . $this->search .'%');
                                        })->orWhereHas('area', function($q) {
                                            $q->where('name', 'LIKE', '%' . $this->search .'%');
                                        })->orWhere('ticket', 'LIKE','%' . $this->search . '%')
                                            ->latest('id')->paginate(8);

        return view('livewire.admin.expired-tickets-index', compact('expiredTickets'));
    }
}
