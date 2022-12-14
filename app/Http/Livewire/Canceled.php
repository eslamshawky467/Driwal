<?php

namespace App\Http\Livewire;


use App\Models\Trip;
use Livewire\Component;

class Canceled extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.canceled', [
            'trips'  => Trip::where('status','canceled')->where('price','like','%'.$this->search.'%')->paginate(PAGINATION)
        ]);
    }
}
