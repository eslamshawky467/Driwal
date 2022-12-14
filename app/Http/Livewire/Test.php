<?php

namespace App\Http\Livewire;


use App\Models\Trip;
use Livewire\Component;

class Test extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.test', [
            'trips'  => Trip::where('status','unfinished')->where('price','like','%'.$this->search.'%')->paginate(PAGINATION)
        ]);
    }
}
