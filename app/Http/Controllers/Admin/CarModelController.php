<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CarModelRepositoryInterface;

class CarModelController extends Controller
{
    protected $car_model;
    public function __construct(CarModelRepositoryInterface $car_model){
        $this->car_model=$car_model;
    }
    public function index()
    {
        return $this->car_model->index();
    }
    public function create()
    {
        return $this->car_model->create();
    }
    public function store(Request $request)
    {
        return $this->car_model->store($request);
    }
    public function edit($id)
    {
        return $this->car_model->edit($id);
    }
    public function update(Request $request,$id)
    {
        return $this->car_model->update($request,$id);
    }
    public function delete(Request $request,$id)
    {
        return $this->car_model->delete($request ,$id);
    }
}
