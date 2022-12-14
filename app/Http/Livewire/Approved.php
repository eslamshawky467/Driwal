<?php

namespace App\Http\Livewire;


use App\Models\Trip;
use Livewire\Component;

class Approved extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.approved', [
            'trips'  => Trip::where('status','approved')->where('price','like','%'.$this->search.'%')->paginate(PAGINATION)
        ]);
    }
}
