<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use Livewire\Component;

use Livewire\WithPagination;

class CitiesIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $cities = City::where('name', 'LIKE', '%' . $this->search .'%')
                        ->orWhereHas('country', function($q) {
                            $q->where('name', 'LIKE', '%' . $this->search .'%');
                        })->paginate();
                        
        return view('livewire.admin.cities-index', compact('cities'));
    }
}
