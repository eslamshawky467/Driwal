<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderApproved extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.order-approved' ,[
            'orders' => Order::where('status','finished')->where('request_id',Null)->where('location', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}
