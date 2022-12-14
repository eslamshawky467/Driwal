<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CostRepositoryInterface;
use Illuminate\Http\Request;

class CostController extends Controller
{
    protected $cost;
    public function __construct(CostRepositoryInterface $cost){
        $this->cost=$cost;
    }
    public function index(){
        return $this->cost->index();
    }
    public function edit(Request $request){
        return $this->cost->edit($request);
    }
}
