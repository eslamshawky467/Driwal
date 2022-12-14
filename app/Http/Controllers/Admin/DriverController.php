<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\DriverRepositoryInterface;
use Illuminate\Http\Request;
class DriverController extends Controller
{
    protected $driver;
    public function __construct(DriverRepositoryInterface $driver)
    {
        $this->driver=$driver;
    }
    public function index()
    {
        return $this->driver->index();
    }
    public function create()
    {
        return $this->driver->create();
    }

    public function store(Request $request)
    {
        return $this->driver->store($request);
    }

    public function delete($id)
    {
        return $this->driver->delete($id);
    }

    public function show($id)
    {
       return $this->driver->show($id);
    }

    public function edit($id)
    {
        return $this->driver->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->driver->update($request,$id);
    }
    public function destroy($id)
    {
        return $this->driver->destroy($id);
    }
    public function delete_All(Request $request){
        return $this->driver->delete_All($request);
    }
    public function active($id){
        return $this->driver->active($id);
    }
    public function inactive($id){
        return $this->driver->inactive($id);
    }
}
