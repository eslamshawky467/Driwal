<?php

namespace App\Http\Livewire;

use App\Models\Driver as drivers;
use Livewire\Component;

class Driver extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.driver', [
            'drivers' =>  drivers::where('name', 'like', '%' . $this->search . '%')->orWhere('phonenumber', 'like', '%' . $this->search . '%')->Sortable()->paginate(PAGINATION),
        ]);
    }
}
