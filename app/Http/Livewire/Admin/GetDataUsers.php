<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class GetDataUsers extends Component
{

    public $document;
    public $name;
    public $email;

    public function render()
    {

        $user = User::where('document', $this->document)->first();

        $this->name = $user->name ?? '';
        $this->email = $user->email ?? '';

        return view('livewire.admin.get-data-users', compact('user'));
    }
}
