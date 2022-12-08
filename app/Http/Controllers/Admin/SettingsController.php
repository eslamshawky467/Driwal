<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\SettingRepositoryInterface;

class SettingsController extends Controller
{
    protected $setting;
    public function __construct (SettingRepositoryInterface $setting){
        $this->setting=$setting;
    }

    public function about_us(){
        return $this->setting->about_us();
    }

    public function about_us_store (Request $request){
        return $this->setting->about_us_store($request);
    }
    public function contact_us_index(){
        return $this->setting->contact_us_index();
    }
    public function contact_us_create(){
        return $this->setting->contact_us_create();
    }
    public function contact_us_store(Request $request){
        return $this->setting->contact_us_store($request);
    }
    public function contact_us_update($id){
        return $this->setting->contact_us_update($id);
    }
    public function about_us_edit(Request $request){
        return $this->setting->about_us_edit($request);
    }
    public function destroy($id){
        return $this->setting->destroy($id);
    }
    public function bulkdelete(){
        return $this->setting->bulkdelete();
    }

    public function qa_index(){
        return $this->setting->qa_index();
    }
    public function qa_create(){
        return $this->setting->qa_create();
    }
    public function qa_store(Request $request){
        return $this->setting->qa_store($request);
    }

    public function qa_update($id){
        return $this->setting->qa_update($id);
    }
    public function qa_edit(Request $request){
        return $this->setting->qa_edit($request);
    }
}
