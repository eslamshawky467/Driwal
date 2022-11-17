<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Nationlity;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.driver.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationlities = Nationlity::all();
        return view('admin.driver.create', compact('nationlities'));
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
            'status' => 'required',
            'nation' => 'required',
        ]);

        Driver::create([
            'name'   => $request->name,
            'email'   => $request->email,
            'password'   => $request->password,
            'phonenumber'   => $request->phone_number,
            'id_number'   => $request->id_number,
            'status'   => $request->status,
            'nationality_id'   => $request->nation,
        ]);

        return redirect()->route('driver.index')->with('success', 'تم إضافة البيانات بنجاح');

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
        $driver = Driver::with('nation')->where('id', $id)->first();
        $nationlities = Nationlity::all();
        return view('admin.driver.edit', compact('driver', 'nationlities'));
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
        $driver = Driver::where('id', $request->id);

        $driver->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phonenumber' => $request->phone_number,
            'status' => $request->status,
            'nationality_id' => $request->nation,
        ]);

        return redirect()->route('driver.index')->with('success', 'تم حفظ البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campany = Driver::find($id);
        $campany->update([
            'status' => 'inactive',
        ]);
        return redirect()->route('driver.index')->with('success', 'تم حفظ البيانات بنجاح');
    }
    public function delete_All(Request $request){
        $ids = json_decode($request->record_ids);
        Driver::whereIn('id', $ids)->update(['status' => 'inactive']);
        return back()->with('success', 'تم حفظ البيانات بنجاح');
    }
}
