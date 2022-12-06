<?php
namespace App\Http\Traits;
use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request)
    {
        if ($request->type == 'client') {
            $guardName = 'client';
        }
        elseif ($request->type == 'admin'){
            $guardName = 'web';
        }
        elseif ($request->type == 'driver'){
            $guardName = 'driver';
        }
        else{
            return dd("error");
        }
        return $guardName;
    }

    public function redirect($request)
    {
        if ($request->type == 'client') {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        if ($request->type == 'driver') {
            return redirect()->intended(RouteServiceProvider::Driver);
        }
        else {
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
    }

}

?>
