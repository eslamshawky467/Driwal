<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderActivePayed extends Component
{

    public $search;
    public function render()
    {
        return view('livewire.order-active-payed',[
            'orders' =>  Order::where('status','active')->where('request_id',Null)->where('location', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}
