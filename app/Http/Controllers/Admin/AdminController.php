<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\AdminRepositoryInterface;

class AdminController extends Controller
{
    protected $admin;
    public function __construct(AdminRepositoryInterface $admin){
        $this->admin=$admin;
    }

    public function index(){
        return $this->admin->index();
    }

    public function profile(){
        return $this->admin->profile();
    }

    public function create(){
        return $this->admin->create();
    }

    public function store(Request $request){
        return $this->admin->store($request);
    }

    public function edit($id){
        return $this->admin->edit($id);
    }

    public function update(Request $request){
        return $this->admin->update($request);
    }
    public function destory($id){
        return $this->admin->destory($id);
    }
    public function bulk_Delete()
    {
        return $this->admin->bulk_Delete();
    }
}
