<?php

namespace App\Http\Controllers\Api\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Http\Client\Factory;
use App\Http\Requests\ClientAuthRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\ResetCodePassword;
use App\Mail\SendCodeRsePassword;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function __construct() {
        $this->middleware('auth:client', ['except' => ['login', 'register']]);
    }


    public function register(ClientAuthRequest $request){

        $validator = Validator::make($request->all(), [
            'name'=> 'required|string|max:20',
            'email' =>'required|email|unique:clients',
            'password' => 'required|string|min:8',
            'phonenumber'=>'required',
            'id_number' =>'required',
        ]

        );

        if($validator->fails()){
            return apiResponse("error",$validator->errors(),422);
        }

        $user = Client::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)],
            ['status'=>'active'],
            ['phonenumber'=>$request->phonenumber],
            ['nationality_id'=>$request->nationality_id],
        ));
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ], 201);
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
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }

        if($validator->fails()){
            return apiResponse("error",$validator->errors(),422);
         }

        if (!$token = auth()->guard('client')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        if(auth()->guard('client')->attempt([
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
            'expires_in' => auth()->guard('client')->factory()->getTTL() * 60,
            'user' => auth('client')->user(),
        ]);
    }
    public function logout()
    {
        auth('client')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('client')->refresh());
    }

    public function me()
    {
        return response()->json(auth('client')->user());
    }



    public function update_profile(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:2|max:100',
            'email'=>'nullable|max:100|exists:clients,email',
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
            'code' => 'required|string|exists:reset_code_passwords',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // find the code
        $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        // find user's email
        $user = Client::firstWhere('email', $passwordReset->email);

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
            'email' => 'required|email|exists:clients',
        ]);

        // Delete all old code that user send before.
        ResetCodePassword::where('email', $request->email)->delete();
        $data['code'] = mt_rand(100000, 999999);
        $codeData = ResetCodePassword::create($data);

        // Send email to user
        Mail::to($request->email)->send(new SendCodeRsePassword($codeData->code));

        return response(['message' => trans('passwords.sent')], 201);
    }




}
