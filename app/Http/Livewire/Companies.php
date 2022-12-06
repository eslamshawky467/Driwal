<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class Companies extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.companies', [
            'companies' =>  Company::where('name', 'like', '%' . $this->search . '%')->orWhere('phonenumber', 'like', '%' . $this->search . '%')->Sortable()->paginate(PAGINATION)
        ]);
    }
}
