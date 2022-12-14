<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface CostRepositoryInterface {
    public function index();
    public function edit(Request $request);

}
