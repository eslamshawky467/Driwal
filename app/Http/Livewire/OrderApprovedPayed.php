<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderApprovedPayed extends Component
{

    public $search;
    public function render()
    {
        return view('livewire.order-approved-payed',[
            'orders' =>  Order::where('status','approved')->where('request_id',Null)->where('location', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}
