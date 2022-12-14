<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class SearchClint extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.search-clint', [
            'users'  => Client::where('name', 'like', '%' . $this->search . '%')->orWhere('phonenumber', 'like', '%' . $this->search . '%')->Sortable()->paginate(PAGINATION)
        ]);
    }
}
