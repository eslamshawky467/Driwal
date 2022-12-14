<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface OrderRepositoryInterface {
    public function active();
    public function create();
    public function inActive();
    public function approved();

    public function payedActive();
    public function payedApproved();
    public function payedInActive();
    public function payedFinished();

    public function store(Request $request);
    public function finished();
    public function update($id);
    public function delete($id);
    public function destroy($id);
}
