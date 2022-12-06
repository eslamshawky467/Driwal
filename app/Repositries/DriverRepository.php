<?php
namespace App\Repositries;



use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Nationlity;
use Illuminate\Support\Facades\Hash;


use App\Interfaces\DriverRepositoryInterface;

class DriverRepository implements DriverRepositoryInterface
{

    public function index()
    {
        return view('admin.driver.index');
    }


    public function create()
    {
        $nationlities = Nationlity::all();
        return view('admin.driver.create', compact('nationlities'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'start_cost'=>'required|numeric|min:0|not_in:0,',
            'email' => 'required',
            'status' => 'required',
            'nation' => 'required',
        ]);

        Driver::create([
            'name'   => $request->name,
            'email'   => $request->email,
            'password'   => Hash::make($request->password),
            'phonenumber'   => $request->phone_number,
            'start_cost' =>$request->start_cost,
            'id_number'   => $request->id_number,
            'status'   => $request->status,
            'nationality_id'   => $request->nation,
        ]);

        return redirect()->route('driver.index')->with('success', trans('admin.createmsg'));

    }

    public function show($id)
    {
        $files=Driver::findOrFail($id)->file;
        return view('admin.driver.show',compact('files'));
    }
    public function edit($id)
    {
        $driver = Driver::with('nation')->where('id', $id)->first();
        $nationlities = Nationlity::all();
        return view('admin.driver.edit', compact('driver', 'nationlities'));
    }
   public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'start_cost'=>'required|numeric|min:0|not_in:0,',
            'email' => 'required',
            'status' => 'required',
            'nation' => 'required',
        ]);
        $driver = Driver::where('id', $request->id);

        $driver->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phonenumber' => $request->phone_number,
            'start_cost' =>$request->start_cost,
            'status' => $request->status,
            'nationality_id' => $request->nation,
        ]);

        return redirect()->route('driver.index')->with('success',trans('admin.updatemsg'));

    }

    public function destroy($id)
    {
        $campany = Driver::find($id);
        $campany->update([
            'status' => 'inactive',
        ]);
        return redirect()->route('driver.index')->with('success',trans('admin.updatemsg'));
    }
    public function delete_All(Request $request){
        $ids = json_decode($request->record_ids);
        Driver::whereIn('id', $ids)->update(['status' => 'inactive']);
        return back()->with('success',trans('admin.updatemsg'));
    }
    public function active($id){
        $driver=Driver::FindOrFail($id);
        $driver->status='active';
        $driver->save();
        return redirect()->route('driver.index')->with('edit',trans('admin.editmsg'));
    }
    public function inactive($id){
        $driver=Driver::FindOrFail($id);
        $driver->status='inactive';
        $driver->save();
        return redirect()->route('driver.index')->with('edit',trans('admin.editmsg'));
    }

}

