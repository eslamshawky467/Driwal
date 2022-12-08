<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface AdminRepositoryInterface {
    public function index();

    public function profile();
    public function create();
    public function store(Request $request);
    public function edit($id);
    public function update(Request $request);
    public function destory($id);
    public function bulk_Delete();
}
