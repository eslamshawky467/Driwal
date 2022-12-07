<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface AdvertisementRepositoryInterface {
    public function index();
    public function create();
    public function store(Request $request);
    public function show_iamge($id);
    public function fileDelete($id);
    public function adDelete($id);
}
