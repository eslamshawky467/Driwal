<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Account;
use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\FileTrait;
class AccountController extends Controller
{
    use FileTrait;
    public function __construct() {
        $this->middleware('auth:client', ['except' => ['login', 'register']]);
    }

    public function make_account(Request $request){
        $validator = Validator::make($request->all(), [
            'file'=>'required',
            'balance'=>'numeric|min:0',
        ],[
            'file.required' =>trans('admin.requirefile'),
            'balance.numeric' => trans('admin.numeric'),
            'balance.min' =>trans('admin.balancemin'),
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }
        if (Account::where('user_id', auth('client')->user()->id)->where('user_type', 'App\Models\Client')->exists()) {
            return response()->json([
                'message' =>trans('admin.exist'),
            ], 401);
        }
        else{
            $acc= Account::create([
                'balance'=>0,
                'status'=>'pending',
                'user_id'=>auth('client')->user()->id,
                'user_type'=>'App\Models\Client',
            ]);
            foreach($request->file('file') as $index=> $file)
            {
                $type= $this->FileType($file->getClientOriginalExtension());
                $name= $this->saveImage($file,$index,'Accounts',auth('client')->user()->id);
                // insert in image_table
                $files= new File();   //files
                $files->file_name=$name;
                $files->Fileable_id= $acc->id;
                $files->Fileable_type ='App\Models\Account';
                $files->type=$type;
                $files->save();
            }
            return response()->json([
                'message' => trans('admin.suceess1'),
            ], 201);
        }
    }


    public function has_account()
    {
        $account = Account::where('user_type', 'App\Models\Client')->where('user_id', auth('client')->user()->id)->first();
        $status = $account->status;
        if (Account::where('user_type', 'App\Models\Client')->where('user_id', auth('client')->user()->id)->exists())
            if ($status == 'pending') {
                return response()->json([
                    'message' => 'pending',
                    'status' => 'يتم مراجعة طلبك حاليا',
                ], 201);
            } elseif ($status == 'approved') {
                return response()->json([
                    'message' => 'True',
                    'balance' => $account->balance,
                    'status' => 'تم تفعيل حسابك بنجاح',
                    'number_account'=>$account->id,
                ], 201);
            } else {
                return response()->json([
                    'message' => 'false',
                ], 201);
            }
    }
}
