<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\nationalityResource;
use App\Http\Traits\DistanceTrait;
use App\Models\Account;
use App\Models\Nationlity;
use App\Models\Order;
use App\Models\Request as ModelsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MainClientController extends Controller
{
    use DistanceTrait;

    public function __construct() {
        $this->middleware('auth:client', ['except' => ['login', 'register','nationality','checkcode']]);
    }
    public function nationality()
    {
        $nationalitys = Nationlity::all();

        if($nationalitys->isEmpty()){
            return response()->json([
                'status' => 422,
                'message'=> 'Success',
                'data' =>'',
            ]);
        }
        $nationality = nationalityResource::collection($nationalitys);
            return response()->json([
                'status' => 200,
                'message'=> 'Success',
                'date'   => $nationality
            ]);

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
            $account = Account::where('user_type', 'App\Models\Client')->where('user_id', auth('client')->user()->id)->first();
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


    public function free_places(Request $request){
        $free_places=ModelsRequest::where('status','approved')->get();
        return response()->json([
            'data'=>$free_places,
            'message'=>'success'
        ],201);

    }
    public function make_order_free(Request $request){
        $validator=Validator::make($request->all(),[
            'location_id' =>'required|exists:requests,id',
            'lat' =>'required|string',
            'long' =>'required|string',
            'my_location'=>'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'message'=>$validator->errors()->first(),
                'status'=> 422
            ]);
        }


        if(Order::where('client_id',auth('client')->user()->id)->where('status','active')->first()){
            return response()->json([
                'message'=>trans('admin.error'),
            ],401);
        }

        $free_place=ModelsRequest::findOrFail($request->location_id);
        $distance=$this->get_distance($request->lat,$request->long,$free_place->latitude,$free_place->longitude);
        $package=$free_place->Packge;
        $discount_trips=0;
        if($distance<100){
            $discount_trips=$package->zones->where('distance','0-100')->first()->discount_trips;
        }
        else if($distance>=100 && $discount_trips<300){
            $discount_trips=$package->zones->where('distance','100-300')->first()->discount_trips;
        }
        else if($distance>=300 && $distance<=500){
            $discount_trips=$package->zones->where('distance','300-500')->first()->discount_trips;
        }
        else{
            $discount_trips=5;
        }
        if($package->remaining_trips<$discount_trips){
            return response()->json([
                'message'=>trans('admin.error'),
            ],401);
        }
        $order=Order::create([
            'location'=>$free_place->location,
            'lat'=>$request->lat,
            'long'=>$request->long,
            'location_lat'=>$free_place->latitude,
            'location_long'=>$free_place->longitude,
            'my_location'=>$request->my_location,
            'client_id'=>auth('client')->user()->id,
            'status' =>'active',
            'request_id' =>$request->location_id,
        ]);
        return response()->json([
            'message'=>'success',
            'data' =>$order
        ],201);

    }

}
