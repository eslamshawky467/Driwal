<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface DriversAccountRepositryInterface {
    public function index();
    public function create();
    public function store(Request $request);
    public function show($id);
    public function update(Request $request, $id);
    public function show_attachments($id);
    public function approve($id);
    public function cancel($id);
    public function destroy($id);
    public function bulkDelete();
}
