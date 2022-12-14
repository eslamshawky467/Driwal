<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface ClientAccountRepositoryInterface {
    public function index();
    public function approve($id);
    public function create();
    public function store(Request $request);
    public function delete($id);
    public function edit($id);
    public function update(Request $request,$id);
    public function show($id);
    public function deletefile($id);
    // public function destroy($id);
}