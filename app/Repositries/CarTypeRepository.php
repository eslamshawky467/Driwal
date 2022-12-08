<?php
namespace App\Repositries;


use App\Models\Banner;
use Illuminate\Http\Request;

use App\Interfaces\CarTypeRepositoryInterface;
use App\Models\Car;

class CarTypeRepository implements CarTypeRepositoryInterface
{
    public function index()
    {
        $types = Car::all();
        return view('admin.car_types.index', compact('types'));
    }
    public function create(){
        return view('admin.car_types.create');
    }

    public function store(Request $request){
        $request->validate( [
            'type_en'=>'required',
            'type_ar'=>'required',
            
        ]);

        $var =  Car::create([
            'type_en'=>$request->type_en,
            'type_ar'=>$request->type_ar,
            
        ]);
        return redirect()->back()->with('message',trans('admin.create'));

      
    }
    public function edit($id)
    {
        $type = Car::FindOrFail($id);
        return view('admin.car_types.edit', compact('type'));
    }

  

       public function update(Request $request, $id)
    {
        $request->validate( [
            'type_en'=>'required',
            'type_ar'=>'required',
            
        ]);
    
        $type=Car::FindOrFail($request->id);
        $type->update([
            'type_en'=>$request->type_en,
            'type_ar'=>$request->type_ar,
        ]);

        return redirect()->back()->with('message',trans('admin.update'));

    }
    public function delete(Request $request,$id)
    {
        $car_type = Car::FindOrFail($request->id);
        $car_type->delete();

        return redirect()->back();
    }


   
}

