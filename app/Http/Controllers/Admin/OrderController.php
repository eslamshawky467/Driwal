<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{

    protected $order;
    public function __construct(OrderRepositoryInterface $order)
    {
        $this->order=$order;
    }

    public function active()
    {
        return $this->order->active();
    }

    public function approved()
    {
        return $this->order->approved();
    }

    public function inActive()
    {
        return $this->order->inActive();

    }

    public function finished()
    {
        return $this->order->finished();
    }

         ////////////////payed orders//////////

    public function payedActive()
    {
        return $this->order->payedActive();
    }

    public function payedApproved()
    {
        return $this->order->payedApproved();
    }

    public function payedInActive()
    {
        return $this->order->payedInActive();

    }

    public function payedFinished()
    {
        return $this->order->payedFinished();
    }


    public function store(Request $request)
    {
        return $this->order->store($request);
    }





    public function update(Request $request, $id)
    {
       return  $this->order->update($request);
    }


    public function destroy($id)
    {
        return $this->order->destroy($id);
    }
    // public function bulkDelete(){
    //     return $this->order->bulkDelete();
    // }
    // public function search(){
    //     return $this->order->search();
    // }
}
