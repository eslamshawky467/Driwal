<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\RequestRepositoryInterface;
use App\Models\Request as ModelsRequest;
use App\Models\File;
use App\Models\Package;

class RequestController extends Controller
{
    // protected $requestion;
    // public function __construct (RequestRepositoryInterface $requestion){
    //     $this->requestion=$requestion;
    // }
    // public function create()
    // {
    //     return $this->requestion->create();
    // }
    // public function store(Request $request)
    // {
    //     return $this->requestion->store($request);
    // }
    public function index()
    {
        $requests = ModelsRequest::get();
        return view('admin.Requests.index',compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }



    public function show_iamge($id)
    {
        try{
            $requests = ModelsRequest::with('file')->findorfail($id);
            // return $accounts->file;
            return view('admin.Requests.show',compact('requests'));
          }  catch(\Exception $e){

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function fileDelete($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect()->route('requests.index')->with('success', 'تم حذف البيانات بنجاح');
    }


    public function appvoved($id)
    {
        $req = ModelsRequest::findOrFail($id);
        if($req->status == 'pending'){
            $req->status = 'approved';
            $req->save();
            return redirect()->route('requests.index')->with('success', 'تم الموافقه  بنجاح');

        }
    }

    public function cancel($id)
    {
        $requests = ModelsRequest::find($id);
        if($requests->status == 'pending'){
            $requests->status = 'canceled';
            $requests->save();
            return redirect()->route('requests.index')->with('success', 'تم الالغاء  بنجاح');

        }
    }

    public function showMap($id)
    {
        $requests = ModelsRequest::find($id);
        return view('admin.map.index',compact('requests'));
    }

    public function showLocation($id)
    {
        $location=[];
        $lang=[];
        $lat=[];

        $locatio = ModelsRequest::where('id', $id)->first();
        $loc = $locatio->location;
        //return var_dump( json_decode( $loc));
        //الى راجع نص مش مصفوفه يعنى متخزنه من البدايه غلط
        //اشوف الرى تيرن بتاع الفنكشن دى فين
        $dat=json_decode($loc);

        //$data=json_decode($loc[0], true);
        return view('admin.location.index',compact('dat'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requests  = ModelsRequest::find($id);
        return view('admin.Requests.edit', compact('requests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requests = ModelsRequest::find($request->id);
        $requests->status = $request->status;
        $requests->save();
        return redirect()->route('requests.index')->with('success', 'تم تعديل البيانات بنجاح');


    //  $requests = ModelsRequest::find($id);
    //     if($requests->status == 'pending'){
    //         $requests->status = 'canceled';
    //         $requests->save();
    //         return redirect()->route('requests.index')->with('success', 'تم الالغاء  بنجاح');
    //     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $requests = ModelsRequest::find($id);
        $requests->delete();
        return redirect()->route('requests.index')->with('success', 'تم حذف البيانات بنجاح');
    }

}
