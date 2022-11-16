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

class DriverAuthController extends Controller
{

    public function __construct() {
        $this->middleware('auth:driver', ['except' => ['login']]);
    }

    public function login(DriverLoginRequest $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:drivers,email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return apiResponse("error",$validator->errors(),422);
         }

        if (!$token = auth()->guard('driver')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        if(auth()->guard('driver')->attempt([
            'status' =>'inactive',
            'email' => $request['email'],
            'password' => $request['password'],
        ])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('driver')->factory()->getTTL() * 60,
            'user' => auth('driver')->user(),
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
        ],200);
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
            ],200);
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
