<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campany;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
        ]);

        Campany::create([
            'name'  => $request->name,
            'phone_number'  => $request->phone_number,
            'email'  => $request->email,
            'password'  => $request->password,
            'status'  => $request->status,
        ]);

        return back()->with('success', 'تم إضافة البيانات بنجاح');

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
        $campany = Campany::where('id' , $id)->first();
        return view('admin.companies.edit', compact('campany'));
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
        $Company = Campany::find($request->id);
        $Company->update([
            'name'   => $request->name,
            'email'   => $request->email,
            'phone_number'   => $request->phone_number,
            'status'   => $request->status,
        ]);
        return redirect()->route('Companies.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campany = Campany::find($id);
        $campany->update([
            'status' => 'inactive',
        ]);
        return redirect()->route('Companies.index')->with('success', 'تم حفظ البيانات بنجاح');
    }

    public function delete_All(Request $request){
        $ids = json_decode($request->record_ids);
        Campany::whereIn('id', $ids)->update(['status' => 'inactive']);
        return back()->with('success', 'تم حفظ البيانات بنجاح');
    }
}
