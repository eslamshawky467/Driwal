<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\DriversAccountRepositryInterface;

class DriversAccountsController extends Controller
{
    protected $driveraccount;
    public function __construct(DriversAccountRepositryInterface $driveraccount){
        $this->driveraccount=$driveraccount;
    }

    public function index()
    {
        return $this->driveraccount->index();
    }

    public function create(){
        return $this->driveraccount->create();
    }

    public function store(Request $request){
        return $this->driveraccount->store($request);
    }
    public function show($id)
    {
        return $this->driveraccount->show($id);
    }


    public function update(Request $request, $id)
    {
        return $this->driveraccount->update($request,$id);
    }
    public function show_attachments($id){
        return $this->driveraccount->show_attachments($id);
    }

    public function approve($id){
        return $this->driveraccount->approve($id);
    }
    public function cancel($id){
        return $this->driveraccount->cancel($id);
    }
    public function destroy($id)
    {
        return $this->driveraccount->destroy($id);
    }
    public function bulkDelete(){
        return $this->driveraccount->bulkDelete();
    }
}
