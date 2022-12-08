<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\BannerRepositoryInterface;
class BannerController extends Controller
{
    protected $banner;
    public function __construct(BannerRepositoryInterface $banner){
        $this->banner=$banner;
    }
    public function index()
    {
        return $this->banner->index();
    }

    public function create()
    {
        return $this->banner->create();
    }


    public function store(Request $request)
    {
        return $this->banner->store($request);
    }

    
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       return  $this->banner->delete($id);
    }
  
}
