<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface PackageCompanyRepositoryInterface {

   
    public function create();
    public function store(Request $request);
   
}