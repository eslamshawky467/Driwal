<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderInActive extends Component
{
    public $search;

    public function render()
    {

        return view('livewire.order-in-active', [
            'inActives' =>  Order::where('status','inactive')->whereNotNull('request_id')->where('location', 'like', '%' . $this->search . '%')->paginate(PAGINATION),
        ]);
    }
}
