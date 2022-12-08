<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\nationalityResource;
use App\Models\Nationlity;

class MainClientController extends Controller
{

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


}
