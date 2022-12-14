<?php
namespace App\Repositries;


use Illuminate\Http\Request;

use App\Interfaces\RequestRepositoryInterface;
use App\Models\Company;
use App\Models\Package;
use App\Models\Request as ModelsRequest;
use App\Http\Traits\FileTrait;
use App\Models\File;

class RequestRepository implements RequestRepositoryInterface
{
    use FileTrait;
    public function create(){
        $packages = Package::all();
        $companies = Company::all();
        return view('admin.requests.create',compact('packages','companies'));
    }

    public function store(Request $request){
        $request->validate([
            'company_id'=>'required',
            'package_id'=>'required',
            'status'=>'required',
            'image'=>'required',
        ]);
       $var =  ModelsRequest::create([
            'company_id'=>$request->company_id,
            'package_id'=>$request->package_id,
            'status'=>$request->status,
        ]);
        foreach($request->file('image') as $index=> $image)
  {
      $type= $this->FileType($image->getClientOriginalExtension());
      $name= $this->saveImage($image,$index,'requests',$request->company_id);
      // insert in image_table

      $images= new File();
      $images->file_name=$name;
      $images->Fileable_id= $var->id;
      $images->Fileable_type = 'App\Models\Request';
      $images->type=$type;
      $images->save();
  }
        return redirect()->route('requestion.create')->with('Add',trans('admin.addmsg'));
    }

}
