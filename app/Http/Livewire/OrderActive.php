<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderActive extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.order-active', [
            'actives' =>  Order::where('status','active')->whereNotNull('request_id')->where('location', 'like', '%' . $this->search . '%')->paginate(PAGINATION),
        ]);
    }
}
