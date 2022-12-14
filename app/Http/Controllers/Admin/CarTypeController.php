<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CarTypeRepositoryInterface;

class CarTypeController extends Controller
{
    protected $car_type;
    public function __construct(CarTypeRepositoryInterface $car_type){
        $this->car_type=$car_type;
    }
    public function index()
    {
        return $this->car_type->index();
    }
    public function create()
    {
        return $this->car_type->create();
    }
    public function store(Request $request)
    {
        return $this->car_type->store($request);
    }
    public function edit($id)
    {
        return $this->car_type->edit($id);
    }
    public function update(Request $request,$id)
    {
        return $this->car_type->update($request,$id);
    }
    public function delete(Request $request,$id)
    {
        return $this->car_type->delete($request ,$id);
    }
}
