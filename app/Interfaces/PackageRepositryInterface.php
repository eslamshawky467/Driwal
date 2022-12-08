<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface PackageRepositryInterface {
    public function index();
    public function create();
    public function store(Request $request);
    public function show($id);
    public function update(Request $request);
    public function destroy($id);
    public function bulkDelete();
    public function search();
}
