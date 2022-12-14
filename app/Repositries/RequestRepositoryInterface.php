<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface RequestRepositoryInterface {
    // public function index();
    public function create();
    public function store(Request $request);
    // public function delete($id);
    // public function destroy($id);
}
