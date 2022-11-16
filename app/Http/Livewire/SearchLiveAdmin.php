<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchLiveAdmin extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.search-live-admin', [
            'admins' => User::where('name', 'like', '%' .  $this->search . '%')->orWhere('email', 'like', '%' .  $this->search . '%')->Sortable()->paginate(5)
        ]);
    }
}
