<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Request as ModelsRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\File;
use App\Http\Traits\FileTrait;
use App\Models\Account;

class RequestController extends Controller
{
    use FileTrait;
    public function createRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required|exists:packges,id',
            'location'   =>'required',
            'file' => 'required'
        ],
     );
        // if($validator->fails()){
        //     return apiResponse("error",$validator->errors(),422);
        //  }
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first()],422);
        }
         $requests = new ModelsRequest;
         $requests->package_id = $request->package_id;
         $requests->location= json_encode($request->location);
         $requests->company_id = auth()->guard('company')->user()->id;
         $requests->status     = 'pending';
         foreach($request->file('file') as $index=> $image)
        {
            $name= $this->saveImage($image,$index,'companies',auth()->guard('company')->user()->id);
            // insert in image_table
            $images= new File();
            $images->file_name=$name;
            $images->Fileable_id=auth()->guard('company')->user()->id;
            $images->Fileable_type = 'App\Models\Company';
            $images->type=$this->FileType($image->getClientOriginalExtension());
            $images->save();
        }
         $requests->save();

        return response()->json([
            'message' => 'Request Created successfully ',
           ], 201);
    }



    public function has_account()
    {
        $account = ModelsRequest::where('company_id', auth('company')->user()->id)->first();
        $status = $account->status;
        if (ModelsRequest::where('company_id', auth('company')->user()->id)->exists())
            if ($status == 'pending') {
                return response()->json([
                    'message' => 'pending',
                    'status' => 'يتم مراجعة طلبك حاليا',
                ], 201);
            } elseif ($status == 'approved') {
                return response()->json([
                    'message' => 'True',
                    'location' => $account->location,
                    'status' => 'تم تفعيل حسابك بنجاح',
                    
                ], 201);
            } else {
                return response()->json([
                    'message' => 'temporary_inactive',
                    'status' => 'تم وقف طلبك ',
                ], 201);
            }
    }

}
