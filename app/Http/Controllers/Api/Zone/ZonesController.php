<?php

namespace App\Http\Controllers\Api\Zone;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZoneResource;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZonesController extends Controller
{
    public function zones(){
        $zones=ZoneResource::collection(Zone::all());
        return response()->json([
            'message' => 'success',
            'data' => $zones,
        ],201);
    }
}
