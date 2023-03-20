<?php

namespace App\Http\Livewire\Admin;

use App\Models\Reinstallation;
use Livewire\Component;

use Livewire\WithPagination;

class ReinstallationsIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {

        $reinstallations = Reinstallation::orWhereHas('user', function($q) {
                                                $q->where('name', 'LIKE', '%' . $this->search .'%')
                                                    ->orWhere('document', 'LIKE', '%' . $this->search .'%')
                                                    ->orWhere('username', 'LIKE', '%' . $this->search .'%');
                                            })->orWhereHas('city', function($q) {
                                                $q->where('name', 'LIKE', '%' . $this->search .'%');
                                            })->orWhere('ticket', 'LIKE','%' . $this->search . '%')
                                                ->latest('id')->paginate(8);

        return view('livewire.admin.reinstallations-index', compact('reinstallations'));
    }
}
