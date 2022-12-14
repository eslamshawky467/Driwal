<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\FileTrait;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;
use App\Models\Cost;
use App\Models\Driver;
use App\Models\File;
use App\Models\Order;
use App\Models\Request as ModelsRequest;
use App\Models\TimesCost;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    use FileTrait;


    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function make_account(Request $request){
        $validator = Validator::make($request->all(), [
            'files'=>'required',
        ],[
            'files.required' =>trans('admin.requirefile'),
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }
        if (Account::where('user_id', auth('driver')->user()->id)->where('user_type', 'App\Models\Driver')->exists()) {
            return response()->json([
                'message' =>trans('admin.exist'),
            ], 401);
        }
        else{
            $acc= Account::create([
                'balance'=>0,
                'status'=>'approved',
                'user_id'=>auth('driver')->user()->id,
                'user_type'=>'App\Models\Driver',
            ]);
            return response()->json([
                'message' => trans('admin.success1'),
            ], 201);
        }
    }


    public function has_account()
    {
        $account = Account::where('user_type', 'App\Models\Driver')->where('user_id', auth('driver')->user()->id)->first();
        if ($account){
            $status = $account->status;
            if ($status == 'pending') {
                return response()->json([
                    'status' => $status,
                    'message' => trans('admin.pendingaccount')
                ], 201);
            } elseif ($status == 'approved') {
                return response()->json([
                    'status' => $status,
                    'balance' => $account->balance,
                    'number_account'=>$account->id,
                    'message'=>trans('admin.approvedaccount')
                ], 201);
            } else {
                return response()->json([
                    'status' => $status,
                    'message'=>trans('admin.canceledaccount')
                ], 201);
            }
        }else{
            return response()->json([
                'status'=>false,
                'message' => trans('admin.unexistaccount'),
            ], 201);
        }
    }

    public function make_transaction(Request $request){
        $validator = Validator::make($request->all(), [
            'amount'=>'required|numeric|min:0|not_in:0',
        ],[
            'amount.required' =>trans('admin.requireamount'),
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }
        try{
            DB::beginTransaction();
            $account = Account::where('user_type', 'App\Models\Driver')->where('user_id', auth('driver')->user()->id)->first();
            if($account && $account->status=='approved'){
                $account->balance+=$request->amount;
                $account->save();
                DB::commit();
                return response()->json([
                    'status' => $account->status,
                    'balance' => $account->balance,
                    'number_account'=>$account->id,
                    'message'=>trans('admin.transactionsuccess')
                ], 201);
            }
            else{
                if($account&&$account->status!='approved'){
                    return response()->json([
                        'status' => $account->status,
                        'message'=>trans('admin.'.$account->status.'account')
                    ], 201);
                }
                else{
                    return response()->json([
                        'status'=>false,
                        'message' => trans('admin.unexistaccount'),
                    ], 201);
                }
            }
        }catch(\Exception $ex){
            DB::rollback();
            return response()->json([
                'message'=>trans('admin.transactionfailed')
            ], 500);
        }

    }
    public function is_active(Request $request){
        $driver=Driver::FindOrFail(auth('driver')->user()->id);
        $validator=Validator::make($request->all(),[
            'is_active'=>'required|boolean|in:0,1',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first()],422);
        }
        $driver->is_active=$request->is_active;
        $driver->save();
        return response()->json([
            'message'=>'success',
            'data'=>$driver,
        ],201);
    }

    public function get_location(Request $request){
        $orders=array();
        $time_costs=$this->get_cost();
        $sort_orders=array();
        $kilo_cost=(double)Cost::first()->kilo_cost;
        $driver=Driver::findOrFail(auth('driver')->user()->id);
        $start_cost=$driver->start_cost;
        if($driver->is_active){
            $client_location=Order::where('status','active')->get();
            $driver_location=$this->database->getReference('test/drivers/'.$driver->id)->getValue();
            $driver_lat=$driver_location['lat'];
            $driver_long=$driver_location['long'];
            $orders = $client_location->map(function($query) use($driver_lat,$driver_long,$kilo_cost,$start_cost,$time_costs){
                $distance= $this->get_distance($query->lat,$query->long,$driver_lat,$driver_long);//100*sqrt((pow($driver_lat-$query->lat,2))+(pow($driver_long-$query->long,2)));
                $destination_distance=$this->get_distance($query->lat,$query->long,$query->location_lat,$query->location_long);//100*sqrt((pow($query->location_lat-$query->lat,2))+(pow($query->location_long-$query->long,2)));
                if($distance<20.0){
                    return array_merge(['id'=>$query->id,'location_lat'=>$query->location_lat,'location_long'=>$query->location_long,'location'=>$query->location,'lat'=>$query->lat,'long'=>$query->long,'my_location'=>$query->my_location],['distance'=>$distance,'destination_distance'=>$destination_distance,'client_name'=>$query->client->name,'estimated_price'=>($query->request_id)?0:($kilo_cost*$destination_distance)+$start_cost+$time_costs]);
                }

            });
        }
        $orders=collect($orders)->sortBy('distance');
        foreach($orders as  $order){
            array_push($sort_orders,$order);
        }
        return response()->json([
            'data'=>$sort_orders,
            'message'=>'success'
        ],201);
    }

    private function get_cost(){
        $date=Carbon::now();
        $date=$date->toTimeString();
        $time_costs=0;
        if('06:00:00'<=$date&&$date<='12:00:00')
            {
                return $time_costs+=TimesCost::where('from','06:00:00')->where('to','12:00:00')->first()->cost;
            }
            else if('12:01:00'<=$date&&$date<='18:00:00'){
                return $time_costs+=TimesCost::where('from','12:01:00')->where('to','18:00:00')->first()->cost;

            }
            else if('18:01:00'<=$date&&$date<='23:59:00'){
                return $time_costs+=TimesCost::where('from','18:01:00')->where('to','00:00:00')->first()->cost;
            }
            else{
                return $time_costs+=TimesCost::where('from','00:00:01')->where('to','05:59:00')->first()->cost;
            }
    }

    private function get_distance($client_lat,$client_long,$driver_lat,$driver_long){
        $R = 6371;
        $lat=(pi()/180)*($driver_lat-$client_lat);
        $lng=(pi()/180)*($driver_long-$client_long);
        $h1= sin($lat/2)*sin($lat/2)+cos((pi()/180)*$client_lat)*cos((pi()/180)*$driver_lat)*sin($lng/2)*sin($lng/2);
        $h2 = 2 *asin(min(1,sqrt($h1)));
        return $R* $h2;
    }

    public function accept_order(Request $request){
        $validator=Validator::make($request->all(),[
            'order_id'=>'required|exists:orders,id',
            'distance'=>'required|numeric',
            'price'=>'required|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }
        $order=Order::where('id',$request->order_id)->where('status','active')->update([
            'status'=>'approved'
        ]);
        $trip=Trip::create([
            'driver_id'=>auth('driver')->user()->id,
            'order_id'=>$request->order_id,
            'client_id'=>Order::FindOrFail($request->order_id)->client_id,
            'price'=>$request->price,
            'distance'=>$request->distance,
            'status'=>'approved',
        ]);
        return response()->json([
            'data'=>$trip,
            'message'=>'succes'
        ]);
    }
    public function cancel_order(Request $request){
        $validator=Validator::make($request->all(),[
            'order_id'=>'required|exists:orders,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }
        Order::findOrFail($request->order_id)->update([
            'status'=>'active'
        ]);
        $trip=Trip::where('order_id',$request->order_id)->where('driver_id',auth('driver')->user()->id)->where('status','approved')->first();
        if($trip){
            $trip->update([
                'status'=>'canceled',
            ]);
        }
        else{
            $trip=Trip::create([
                'driver_id'=>auth('driver')->user()->id,
                'order_id'=>$request->order_id,
                'client_id'=>Order::FindOrFail($request->order_id)->client_id,
                'price'=>0,
                'distance'=>0,
                'status'=>'canceled',
        ]);
    }
        return response()->json([
            'data'=>$trip,
            'message'=>'succes'
        ]);
    }

    public function finish_order(Request $request){
        $validator=Validator::make($request->all(),[
            'order_id'=>'required|exists:orders,id',
            'distance'=>'required|numeric',
            'waiting_time'=>'required|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }
        try{
            DB::beginTransaction();
            $trip=Trip::where('order_id',$request->order_id)->where('driver_id',auth('driver')->user()->id)->where('status','approved')->first();
            $order=Order::findOrFail($request->order_id);
            if($order->request_id){
                $price=0;
                $waiting_time=0;
                $payment_type='free';
                $freeplace=ModelsRequest::findOrFail($order->request_id);
                $package=$freeplace->Packge;
                $discount_trips=0;
                if($request->distance<100){
                    $discount_trips=$package->zones->where('distance','0-100')->first()->discount_trips;
                }
                else if($request->distance>=100 && $request->distance<300){
                    $discount_trips=$package->zones->where('distance','100-300')->first()->discount_trips;
                }
                else if($request->distance>=300 && $request->distance<=500){
                    $discount_trips=$package->zones->where('distance','300-500')->first()->discount_trips;
                }
                else{
                    $discount_trips=5;
                }
                $package->remaining_trips-=$discount_trips;
                $package->save();
                // $zones=$package->zones;
                // $zones=collect($zones)->sortBy('distance');
                // $done=0;
                // foreach($zones as $zone){
                //     if($request->distance<$zone->distance){
                //
                //         $done=1;
                //         break;
                //     }
                // }
                // if(!$done){
                //     $package->remaining_trips-=5;
                //     $package->save();
                // }
            }else{
                $cost=Cost::first();
                $waiting_cost=$cost->waiting_cost;
                $kilo_cost=$cost->kilo_cost;
                $distance=(double)$request->distance;
                $waiting_time=(double)$request->waiting_time;
                $start_cost=Driver::findOrFail($trip->driver_id)->start_cost;
                $time_costs=$this->get_cost();
                $price=($distance * $kilo_cost)+($waiting_time*$waiting_cost)+($start_cost)+($time_costs);
                $client_account=Account::where('user_type','App\Models\Client')->where('user_id',$order->client_id)->first();
                $driver_account=Account::where('user_type','App\Models\Driver')->where('user_id',$trip->driver_id)->first();
                if($client_account->balance<$price){
                    return response()->json([
                        'data'=>[],
                        'message'=>trans('admin.balancenotenought')
                    ],401);
                }
                $client_account->balance-=$price;
                $client_account->save();
                $admin_account=Account::findOrFail(0);
                $admin_cost=($cost->admin_cost * (($distance * $kilo_cost)+($waiting_time*$waiting_cost)+($time_costs)));
                $admin_account->balance+=$admin_cost;
                $admin_account->save();
                $driver_account->balance+=($price-$admin_cost);
                $driver_account->save();
                $payment_type='visa';
            }
            $order->status='finished';
            $order->save();
            $trip->distance=$request->distance;
            $trip->price=$price;
            $trip->waiting_time=$waiting_time;
            $trip->status='finished';
            $trip->payment_type=$payment_type;
            $trip->save();
            DB::commit();
            return response()->json([
                'data'=>$trip,
                'message'=>'succes'
            ]);
        }catch(\Exception $ex){
            DB::rollBack();
            return response()->json([
                'message'=>trans('admin.error'),
            ],401);
        }
    }

    public function finish_order_cash(Request $request){

        $validator=Validator::make($request->all(),[
            'order_id'=>'required|exists:orders,id',
            'distance'=>'required|numeric',
            'waiting_time'=>'required|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }
        try{
            DB::beginTransaction();
            $cost=Cost::first();
            $waiting_cost=$cost->waiting_cost;
            $kilo_cost=$cost->kilo_cost;
            $distance=(double)$request->distance;
            $waiting_time=(double)$request->waiting_time;
            $trip=Trip::where('order_id',$request->order_id)->where('driver_id',auth('driver')->user()->id)->where('status','approved')->first();
            $start_cost=Driver::findOrFail($trip->driver_id)->start_cost;
            $order=Order::findOrFail($request->order_id);
            $time_costs=$this->get_cost();
            $price=($distance * $kilo_cost)+($waiting_time*$waiting_cost)+($start_cost)+($time_costs);
            $driver_account=Account::where('user_type','App\Models\Driver')->where('user_id',$trip->driver_id)->first();
            $admin_account=Account::findOrFail(0);
            $admin_cost=($cost->admin_cost * (($distance * $kilo_cost)+($waiting_time*$waiting_cost)+($time_costs)));
            $admin_account->balance+=$admin_cost;
            $admin_account->save();
            $driver_account->balance+=($price-$admin_cost);
            $driver_account->save();
            $order->status='finished';
            $order->save();
            $trip->distance=$request->distance;
            $trip->price=$price;
            $trip->waiting_time=$waiting_time;
            $trip->status='finished';
            $trip->payment_type='cash';
            $trip->save();
            DB::commit();
            return response()->json([
                'data'=>$trip,
                'message'=>'succes'
            ]);
        }catch(\Exception $ex){
            DB::rollBack();
            return response()->json([
                'message'=>trans('admin.error'),
            ],401);
        }

    }

    public function number_trips(Request $request){
        $driver=Driver::FindOrFail(auth('driver')->user()->id);
        $trips=Trip::where('driver_id',$driver->id)->where('status','finished')->get();
        $trips_count=$trips->count();
        return response()->json([
            'data'=>[
                'trips'=>$trips,
                'trips_count'=>$trips_count,
            ],
            'message'=>'succes',
        ]);
    }
}
