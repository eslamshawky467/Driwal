<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packge;
use App\Http\Resources\PackageResource;

class PackageController extends Controller
{
    public function allPackages()
    {
        $packages = Packge::where('status','active')->get();
        if($packages->isEmpty()){
            return response()->json([
                'status' => 422,
                'message'=> 'Success',
                'data' =>'',
            ]);
        }
        $packages = PackageResource::collection($packages);
            return response()->json([
                'status' => 200,
                'message'=> 'Success',
                'date'   => $packages
            ]);
    }
}
