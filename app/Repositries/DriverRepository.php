<?php
namespace App\Repositries;



use App\Models\Car;
use App\Models\Driver;
use App\Models\CarModel;
use App\Models\Nationlity;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\DriverRepositoryInterface;
use App\Http\Traits\FileTrait;
use App\Models\File;
class DriverRepository implements DriverRepositoryInterface
{
    use FileTrait;

    public function index()
    {
        return view('admin.driver.index');
    }


    public function create()
    {
        $nationlities = Nationlity::all();
        $car_models = CarModel::all();
        $types = Car::all();
        return view('admin.driver.create', compact('nationlities','car_models','types'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'start_cost'=>'required|numeric|min:0|not_in:0,',
            'email' => 'required|email|unique:drivers,email,'.$request->id,
            'status' => 'required',
            'nation' => 'required',
            'id_number' => 'required|unique:drivers,id_number,'.$request->id,
            'license_number' => 'required',

            'license_expiration' => 'required',
            'number_plate' => 'required',
            'transport_year' => 'required',
            'governorate' => 'required',
            'neighborhood' => 'required',
            'street' => 'required',
            'building_number' => 'required',
            'car_model' => 'required',
            'car_type' => 'required',
            'files' => 'required',

        ]);

       $driver =  Driver::create([
            'name'   => $request->name,
            'email'   => $request->email,
            'password'   => Hash::make($request->password),
            'phonenumber'   => $request->phone_number,
            'start_cost' =>$request->start_cost,
            'id_number'   => $request->id_number,
            'status'   => $request->status,
            'nationality_id'   => $request->nation,


            'license_number'   => $request->license_number,
            'license_expiration'   => $request->license_expiration,
            'number_plate'   => $request->number_plate,
            'transport_year'   => $request->transport_year,
            'governorate'   => $request->governorate,
            'neighborhood'   => $request->neighborhood,
            'street'   => $request->street,
            'building_number'   => $request->building_number,
            'model_id'   => $request->car_model,
            'type_id'   => $request->car_type,
            'files'   => $request->files,

        ]);
        foreach($request->file('files') as $index=> $file)
        {

            $type= $this->FileType($file->getClientOriginalExtension());
            $name= $this->saveImage($file,$index,'drivers',$driver->id);
            // insert in image_table
            $files= new File();   //files
            $files->file_name=$name;
            $files->Fileable_id= $driver->id;
            $files->Fileable_type ='App\Models\Driver';
            $files->type=$type;
            $files->save();
        }

        return redirect()->route('driver.index')->with('success', trans('admin.createmsg'));

    }

    public function show($id)
    {
        $files=Driver::findOrFail($id)->file;
        return view('admin.driver.show',compact('files'));
    }
    public function edit($id)
    {
        $driver = Driver::FindOrFail($id);
        $nationlities = Nationlity::all();
        $car_models = CarModel::all();
        $types = Car::all();
        return view('admin.driver.edit', compact('driver', 'nationlities','car_models','types'));
    }
   public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'phone_number' => 'required',
            'start_cost'=>'required|numeric|min:0|not_in:0,',
            'email' => 'required|email|unique:drivers,email,'.$request->id,
            'status' => 'required',
            'nation' => 'required',
            'id_number' => 'required|unique:drivers,id_number,'.$request->id,
            'license_number' => 'required',

            'license_expiration' => 'required',
            'number_plate' => 'required',
            'transport_year' => 'required',
            'governorate' => 'required',
            'neighborhood' => 'required',
            'street' => 'required',
            'building_number' => 'required',
            'car_model' => 'required',
            'car_type' => 'required',

        ]);
        $driver = Driver::where('id', $request->id);

        $driver->update([
            'name'   => $request->name,
            'email'   => $request->email,
            'password'   => Hash::make($request->password),
            'phonenumber'   => $request->phone_number,
            'start_cost' =>$request->start_cost,
            'id_number'   => $request->id_number,
            'status'   => $request->status,
            'nationality_id'   => $request->nation,


            'license_number'   => $request->license_number,
            'license_expiration'   => $request->license_expiration,
            'number_plate'   => $request->number_plate,
            'transport_year'   => $request->transport_year,
            'governorate'   => $request->governorate,
            'neighborhood'   => $request->neighborhood,
            'street'   => $request->street,
            'building_number'   => $request->building_number,
            'model_id'   => $request->car_model,
            'type_id'   => $request->car_type,
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

