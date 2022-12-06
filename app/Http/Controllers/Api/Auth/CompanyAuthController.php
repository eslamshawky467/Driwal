<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\ResetCodePassword;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCodeCompany;
use App\Models\ResePasswordCompany;

class CompanyAuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:company', ['except' => ['login']]);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:companies,email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first(),'status'=> 422]);
        }

        if (!$token = auth()->guard('company')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        if(auth()->guard('company')->attempt([
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
            'expires_in' => auth()->guard('company')->factory()->getTTL() * 60,
            'user' => auth('company')->user(),
        ]);
    }
    public function logout()
    {
        auth('company')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('company')->refresh());
    }

    public function me()
    {
        return response()->json(auth('company')->user());
    }


    public function update_profile(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],422);
        }
        $company =  Company::where('id',auth()->guard('company')->user()->id)->first();
        $company->name = $request->name;
        $company->save();
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
            'code' => 'required|string|exists:rese_password_companies',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // find the code
        $passwordReset = ResePasswordCompany::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        // find user's email
        $user = Company::firstWhere('email', $passwordReset->email);

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
            'email' => 'required|email|exists:companies',
        ]);

        // Delete all old code that user send before.
        ResePasswordCompany::where('email', $request->email)->delete();
        $data['code'] = mt_rand(100000, 999999);
        $codeData = ResePasswordCompany::create($data);

        // Send email to user
        Mail::to($request->email)->send(new SendCodeCompany($codeData->code));

        return response(['message' => trans('passwords.sent')], 201);
    }

}
