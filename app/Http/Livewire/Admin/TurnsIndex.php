<?php

namespace App\Http\Livewire\Admin;

use App\Models\Turn;
use Livewire\Component;

use Livewire\WithPagination;

class TurnsIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {   

        $turns = Turn::orWhereHas('user', function($q) {
                            $q->where('name', 'LIKE', '%' . $this->search .'%')
                                ->orWhere('document', 'LIKE', '%' . $this->search .'%')
                                ->orWhere('username', 'LIKE', '%' . $this->search .'%');
                        })->orWhereHas('site', function($q) {
                            $q->where('name', 'LIKE', '%' . $this->search .'%');
                        })->latest('id')->paginate(8);
        
        return view('livewire.admin.turns-index', compact('turns'));

    }
}
