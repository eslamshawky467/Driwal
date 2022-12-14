<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CompanyRepositoryInterface;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $company;
    public function __construct(CompanyRepositoryInterface $company)
    {
        $this->company=$company;
    }
    public function index()
    {
        return $this->company->index();
    }

    public function create()
    {
        return $this->company->create();
    }

    public function store(Request $request)
    {
        return $this->company->store($request);
    }

    public function edit($id)
    {
        return $this->company->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->company->update($request,$id);
    }

    public function destroy($id)
    {
        return $this->company->destroy($id);
    }

    public function delete_All(Request $request){
        return $this->company->delete_All($request);
    }
}
