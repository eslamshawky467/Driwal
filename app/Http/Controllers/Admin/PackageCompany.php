<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PackageCompanyRepositoryInterface;
use Illuminate\Http\Request;

class PackageCompany extends Controller
{
    protected $company;
    public function __construct(PackageCompanyRepositoryInterface $company)
    {
        $this->company=$company;
    }
   

    public function create()
    {
        return $this->company->create();
    }

    public function store(Request $request)
    {
        return $this->company->store($request);
    }

    
}
