<?php
namespace App\Repositries;


use App\Models\Car;
use App\Models\Banner;

use Illuminate\Http\Request;
use App\Interfaces\CarModelRepositoryInterface;
use App\Models\CarModel;

class CarModelRepository implements CarModelRepositoryInterface
{
    public function index()
    {
        $models = CarModel::all();
        return view('admin.car_models.index', compact('models'));
    }
    public function create(){
        return view('admin.car_models.create');
    }

    public function store(Request $request){
        $request->validate( [
            'model'=>'required',
            
            
        ]);

        $var =  CarModel::create([
            'model'=>$request->model,
            
        ]);
        return redirect()->back()->with('message',trans('admin.create'));

      
    }
    public function edit($id)
    {
        $model = CarModel::FindOrFail($id);
        return view('admin.car_models.edit', compact('model'));
    }

  

       public function update(Request $request, $id)
    {
        $request->validate( [
            'model'=>'required',
            
            
        ]);
    
        $type=CarModel::FindOrFail($request->id);
        $type->update([
            'model'=>$request->model,
           
        ]);

        return redirect()->back()->with('message',trans('admin.update'));


    }

    public function delete(Request $request,$id)
    {
        $car_model = CarModel::FindOrFail($request->id);
        $car_model->delete();

        return redirect()->back();
    }


   
}

