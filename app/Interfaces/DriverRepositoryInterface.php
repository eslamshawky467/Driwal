<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface DriverRepositoryInterface {

    public function index();
    public function create();
    public function store(Request $request);
    public function show($id);
    public function edit($id);
    public function update(Request $request, $id);
    public function destroy($id);
    public function delete_All(Request $request);
    public function active($id);
    public function inactive($id);
}
