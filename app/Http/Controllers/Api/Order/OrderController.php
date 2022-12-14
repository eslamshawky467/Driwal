<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:client']);
    }
    public function make_order(Request $request){
        $validator=Validator::make($request->all(),[
            'location' =>'required|string',
            'lat' =>'required|string',
            'long' =>'required|string',
            'location_lat'=>'required|string',
            'location_long'=>'required|string',
            'my_location'=>'requierd|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }
        if(Order::where('client_id',auth('client')->user()->id)->where('status','active')->first()){
            return response()->json([
                'message'=>trans('admin.error'),
            ],401);
        }
        $order=Order::create([
            'location'=>$request->location,
            'lat'=>$request->lat,
            'long'=>$request->long,
            'location_lat'=>$request->location_lat,
            'location_long'=>$request->location_long,
            'my_location'=>$request->my_location,
            'client_id'=>auth('client')->user()->id,
            'status' =>'active'
        ]);
        return response()->json([
            'message'=>'success',
            'data' =>$order
        ],201);

    }
    public function cancel_order(Request $request){
        $order=Order::where('client_id',auth('client')->user()->id)->where('status','active')->first();
        if($order){
            $order->status='inactive';
            $order->save();
        }
        return response()->json([
            'message'=>'succes',
        ],201);

    }
}
