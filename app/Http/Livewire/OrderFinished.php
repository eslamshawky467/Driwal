<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderFinished extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.order-finished' ,[
            'finisheds' =>  Order::where('status','finished')->whereNotNull('request_id')->where('location', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}
