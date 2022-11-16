<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel ;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    public function createRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required|exists:packges,id',
        ],
     );
        if($validator->fails()){
            return apiResponse("error",$validator->errors(),422);
         }
         $requests = new RequestModel;
         $requests->package_id = $request->package_id;
         $requests->company_id = auth()->guard('company')->user()->id;
         $requests->status     = 'pinding';
         $requests->save();

        return response()->json([
            'message' => 'Request Create successfully ',
           ], 200);
    }

    public function packageStatus()
    {
        dd('ddddd');
    }
}
