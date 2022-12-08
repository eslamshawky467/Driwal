<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface SettingRepositoryInterface {

    public function about_us();
    public function about_us_store (Request $request);
    public function contact_us_index();
    public function contact_us_create();
    public function contact_us_store(Request $request);
    public function contact_us_update($id);
    public function about_us_edit(Request $request);
    public function destroy($id);
    public function bulkdelete();
    public function qa_index();
    public function qa_create();
    public function qa_store(Request $request);
    public function qa_update($id);
    public function qa_edit(Request $request);

}