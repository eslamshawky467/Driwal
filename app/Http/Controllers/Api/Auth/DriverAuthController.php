<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DriverLoginRequest;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;
use App\Models\ResetCodePassword;
use App\Mail\SendCodedriver;
use Illuminate\Support\Facades\Mail;
use App\Models\ResePasswordDriver;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\FileTrait;

class DriverAuthController extends Controller
{
    use FileTrait;

    public function __construct() {
        $this->middleware('auth:driver-api', ['except' => ['login','register']]);
    }

    public function login(Request $request){


        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ],[
            'email.required' =>'E-mail Required ',
            'email.email' =>'Please Enter  Email',
            'password.required' =>' Password Required ',
            'password.min'=>'This password is Very Short',
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }

        if(!$token = auth()->guard('driver-api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        if(auth()->guard('driver-api')->attempt([
            'status' =>'inactive',
            'email' => $request['email'],
            'password' => $request['password'],
        ]))
        return $this->respondWithToken($token);
        {
            return response()->json(['error' => 'Unauthorizedssss'], 401);
        }
        // return $this->respondWithToken($token);
    }



    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string|max:20',
            'email' =>'required|email|unique:drivers',
            'password' => 'required|string|min:8',
            'phonenumber'=>'required|unique:drivers',
            'id_number' => 'required|unique:drivers',
            'nationality_id' =>'required',
            'type_id' =>'required',
            'model_id' =>'required',
            'file' =>'required',
        ],[
            'email.required' =>'E-mail Required ',
            'email.email' =>'Please Enter  Email',
            'password.required' =>' Password Required ',
            'password.min'=>'This password is Very Short',
            'name.required'=>'Name is Required',
            'name.max'=>'Name is very Long',
            'phonenumber.required'=>'Phone Number Required',
            'email.unique'=>'email is Already Taken',
            'id_number.required' =>'Identity Card Required ',
            'id_number.unique'=>'Identity Card is Already Taken',
            'nationality_id.required' =>'Nationality is Required ',
            'type_id.required' =>'Type is Required ',
            'model_id.required' =>'Model is Required ',
            'file.required' =>'File is Required ',
            'phonenumber.unique'=>'Phone Number is Already Taken',

        ]);



        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 422);
        }
        $user = Driver::create(array_merge(
            $validator->validated(),
            ['password' =>bcrypt($request->password)],
            ['status'=>'inactive'],
            ['start_cost'=>'10'],
            ['type_id'=>'1'],
        ));
        foreach($request->file('file') as $index=> $image)
        {
            $name= $this->saveImage($image,$index,'drivers',$request->user_id);
            // insert in image_table
            $images= new File();
            $images->file_name=$name;
            $images->Fileable_id= $user->id;
            $images->Fileable_type = 'App\Models\Driver';
            $images->type=$this->FileType($image->getClientOriginalExtension());
            $images->save();
        }
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }





    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('driver-api')->factory()->getTTL() * 60,
            'user' => auth('driver-api')->user(),
        ]);
    }
    public function logout()
    {
        auth('driver')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('client')->refresh());
    }

    public function me()
    {
        return response()->json(auth('driver')->user());
    }

    public function update_profile(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:2|max:100',
            'email'=>'nullable|max:100',
            'phone_number'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],422);
        }
        $user=$request->user();
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
        ]);

        return response()->json([
            'message'=>'Profile successfully updated',
        ],201);
    }


    public function change_password(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password'=>'required',
            'password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],422);
        }

        $user=$request->user();
        if(Hash::check($request->old_password,$user->password)){
            $user->update([
                'password'=>Hash::make($request->password)
            ]);
            return response()->json([
                'message'=>'Password successfully updated',
            ],201);
        }else{
            return response()->json([
                'message'=>'Old password does not matched',
            ],400);
        }

    }
    public function code(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:rese_password_drivers',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // find the code
        $passwordReset = ResePasswordDriver::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        // find user's email
        $user = Driver::firstWhere('email', $passwordReset->email);

        // update user password
        $user->update([
            'password'=> Hash::make($request->password)]);

        // delete current code
        $passwordReset->delete();

        return response(['message' =>'password has been successfully reset'], 201);
    }
    public function forget(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:drivers',
        ]);

        // Delete all old code that user send before.
        ResePasswordDriver::where('email', $request->email)->delete();
        $data['code'] = mt_rand(100000, 999999);
        $codeData = ResePasswordDriver::create($data);

        // Send email to user
        Mail::to($request->email)->send(new SendCodedriver($codeData->code));

        return response(['message' => trans('passwords.sent')], 201);
    }
}
