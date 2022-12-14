<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PackageRepositryInterface;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected $package;

    public function __construct(PackageRepositryInterface $package){
        $this->package=$package;
    }

    public function index()
    {
        return $this->package->index();
    }


    public function create()
    {
        return $this->package->create();
    }


    public function store(Request $request)
    {
        return $this->package->store($request);
    }


    public function show($id)
    {
        return $this->package->show($id);
    }


    public function update(Request $request, $id)
    {
       return  $this->package->update($request);
    }


    public function destroy($id)
    {
        return $this->package->destroy($id);
    }
    public function bulkDelete(){
        return $this->package->bulkDelete();
    }
    public function search(){
        return $this->package->search();
    }
}
