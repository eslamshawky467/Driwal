<?php

namespace App\Http\Controllers\Admin;
use App\Interfaces\TripRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{
    protected $trip;
    public function __construct(TripRepositoryInterface $trip){
        $this->trip=$trip;
    }
    public function finished(){
        return $this->trip->finished();
    }
    public function canceled(){
        return $this->trip->canceled();
    }
    public function approved(){
        return $this->trip->approved();
    }
    public function unfinished(){
        return $this->trip->unfinished();
    }
}
