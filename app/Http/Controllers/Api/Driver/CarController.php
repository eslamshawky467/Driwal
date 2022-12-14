<?php

namespace App\Http\Controllers\Api\Driver;

use App\Models\Car;
use App\Models\File;
use App\Models\Account;
use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Http\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarTypeResource;
use App\Http\Resources\CarModelResource;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
 
    public function get_cars()
    {
        
        $cars = Car::all();
        $car_model = CarModel::all();

        $carss = CarTypeResource::collection($cars);
        $car_models = CarModelResource::collection($car_model);
        if($cars->isEmpty()){
            return response()->json([
                'status' => 201,
                'message'=> 'Success',
                'data' => ['types' => '' ,
                           'models' => $car_models]
            ],201);
        }
        if($car_model->isEmpty()){
            return response()->json([
                'status' => 201,
                'message'=> 'Success',
                'data' => ['types' => $carss ,
                           'models' => '']
            ],201);
        }
       

            return response()->json([
                'status' => 201,
                'message'=> 'Success',
                'data'   => ['types' => $carss ,
                             'models' => $car_models]
            ],201);

           

         
    }


    
}
