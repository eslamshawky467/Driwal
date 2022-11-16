<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
class LoginController extends Controller

{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthTrait;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function log($type){
        if($type !="admin" && $type!="client") {
            return dd($type);
        }
        else {
            return view('auth.login', compact('type'));
        }
    }
    public function logs($type='admin'){

        return view('auth.login',compact('type'));
    }



    public function login(Request $request){
        if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->redirect($request);
        }
        else{
            return redirect()->back()->with('message', 'E-mail Or Password is Wrong');
        }

    }

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
