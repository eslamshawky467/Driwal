<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $req = ModelsRequest::first();
      return view('admin.map.index',compact('req'));
    }
}
