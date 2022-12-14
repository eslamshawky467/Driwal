<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderInActivePayed extends Component
{
    public function render()
    {

        return view('livewire.order-in-active-payed', [
            'inActives' =>  Order::where('status','inactive')->whereNotNull('request_id')->where('location', 'like', '%' . $this->search . '%')->paginate(PAGINATION),
        ]);
    }
}
