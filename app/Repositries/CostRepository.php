<?php
namespace App\Repositries;



use Illuminate\Http\Request;
use App\Interfaces\CostRepositoryInterface;
use App\Models\Cost;

class CostRepository implements CostRepositoryInterface
{
    public function index(){
        $costs=Cost::first();
        return view('admin.costs.index',compact('costs'));
    }

    public function edit(Request $request){
        $request->validate([
            'kilo_cost'=>'required|numeric|min:0|not_in:0,',
            'waiting_cost'=>'required|numeric|min:0|not_in:0,',
            'admin_cost' =>'required|numeric|min:0|not_in:0,1',
        ]);
        if((double)$request->admin_cost>1){
            return redirect()->back()->with("message",trans('admin.costmessage'));
        }
        $cost=Cost::first()->update([
            'kilo_cost'=>$request->kilo_cost,
            'waiting_cost'=>$request->waiting_cost,
            'admin_cost'=>$request->admin_cost,
            'driver_cost'=>1-$request->admin_cost
        ]);

        return redirect()->back()->with('edit',trans('admin.updatemsg'));
    }
}

