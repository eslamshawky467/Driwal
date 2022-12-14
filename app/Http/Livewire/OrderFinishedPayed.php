<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderFinishedPayed extends Component
{

    public $search;
    public function render()
    {
        return view('livewire.order-finished-payed',[
            'orders' =>  Order::where('status','finished')->where('request_id',Null)->where('location', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}
