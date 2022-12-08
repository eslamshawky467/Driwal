<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ZoneRepositryInterface;

class ZoneController extends Controller
{
    protected $zone;
    public function __construct(ZoneRepositryInterface $zone){
        $this->zone=$zone;
    }
    public function index()
    {
        return $this->zone->index();
    }


    public function create()
    {
        return $this->zone->create();
    }


    public function store(Request $request)
    {
        return $this->zone->store($request);
    }


    public function show($id)
    {
        return $this->zone->show($id);
    }


    public function update(Request $request, $id)
    {
        return $this->zone->update($request);
    }


    public function destroy($id)
    {
        return $this->zone->destroy($id);
    }
    public function bulkDelete(){
        return $this->zone->bulkDelete();
    }
}
