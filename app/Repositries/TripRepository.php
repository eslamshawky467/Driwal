<?php
namespace App\Repositries;

use App\Interfaces\TripRepositoryInterface;


use App\Models\Order;
use App\Models\Trip;
use Illuminate\Http\Request;


class TripRepository implements TripRepositoryInterface
{
    public function finished()
    {
        return view('admin.trips.finished');
    }

    public function canceled()
    {
        return view('admin.trips.canceled');
    }
    public function approved()
    {
        return view('admin.trips.approved');
    }

    public function unfinished()
    {
        return view('admin.trips.test');
    }


}

