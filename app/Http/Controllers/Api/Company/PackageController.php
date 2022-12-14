<?php

namespace App\Http\Controllers\Api\Company;
use App\Models\Banner;
use App\Models\Packge;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Http\Resources\PackageResource;
use App\Http\Resources\advertisementsResource;
use App\Http\Resources\PackageCompanyResource;
use App\Models\Request as ModelsRequest;

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

    public function packageCompany()
    {
        $company = ModelsRequest::where('company_id', auth()->guard('company')->user()->id)->first();
        $company = new PackageCompanyResource($company);
        return response()->json([
            'message' => 'Success',
            'date'   => $company
        ], 201);
    }

    public function allBanners()
    {
        $bananers = Banner::get();
        $banners_data = BannerResource::collection($bananers);
        return response()->json([
            'message' => 'Success',
            'date'   => $banners_data
        ], 201);
    }
    public function alladvertisements()
    {
        // return $advertisements = Advertisement::with('file')->get();
        $advertisements = Advertisement::
        with(['file'=>
        function ($query){
            $query->AdvertisementFile();
        }]);
       return  $advertisement_data = advertisementsResource::collection($advertisements);

    }
}
