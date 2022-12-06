<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface CarModelRepositoryInterface {
    public function index();
    public function create();
    public function store(Request $request);
    public function edit($id);
    public function update(Request $request,$id);
    public function delete(Request $request,$id);
    // public function destroy($id);
}
