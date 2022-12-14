<?php

namespace App\Http\Livewire;


use App\Models\Trip;
use Livewire\Component;

class Finished extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.finished', [
            'trips'  =>  Trip::where('status','finished')->where('price','like','%'.$this->search.'%')->paginate(PAGINATION)
        ]);
    }


}
