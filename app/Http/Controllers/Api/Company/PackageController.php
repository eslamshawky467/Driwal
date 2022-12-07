<?php

namespace App\Http\Controllers\Api\Company;

use App\Models\Packge;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;

class PackageController extends Controller
{
    public function allPackages()
    {
        $packages = Package::where('status','active')->get();
        if($packages->isEmpty()){
            return response()->json([
                'message'=> 'Success',
                'data' =>'',
            ],422);
        }
        $packages = PackageResource::collection($packages);
            return response()->json([
                'message'=> 'Success',
                'date'   => $packages
            ],201);
    }
}
