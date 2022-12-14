<?php
namespace App\Interfaces;
use Illuminate\Http\Request;
interface TripRepositoryInterface {
    public function finished();
    public function canceled();
    public function unfinished();
    public function approved();


}
