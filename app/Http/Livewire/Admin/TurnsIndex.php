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

        $turns = Turn::where('user_id', 'LIKE', '%' . $this->search .'%')->paginate(10);

        return view('livewire.admin.turns-index', compact('turns'));

    }
}
