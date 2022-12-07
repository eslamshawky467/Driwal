<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\FileTrait;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;
use App\Models\File;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    use FileTrait;


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
                'status'=>'pending',
                'user_id'=>auth('driver')->user()->id,
                'user_type'=>'App\Models\Driver',
            ]);

            foreach($request->file('files') as $index=> $file)
            {

                $type= $this->FileType($file->getClientOriginalExtension());
                $name= $this->saveImage($file,$index,'accounts',$acc->id);
                // insert in image_table
                $files= new File();   //files
                $files->file_name=$name;
                $files->Fileable_id= $acc->id;
                $files->Fileable_type ='App\Models\Account';
                $files->type=$type;
                $files->save();
            }
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
}
