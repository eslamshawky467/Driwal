<?php

namespace App\Http\Livewire;

use App\Models\Campany;
use Livewire\Component;

class Companies extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.companies', [
            'companies' =>  Campany::where('name', 'like', '%' . $this->search . '%')->orWhere('phone_number', 'like', '%' . $this->search . '%')->Sortable()->paginate(5)
        ]);
    }
}
