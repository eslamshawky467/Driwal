<?php
namespace App\Http\Traits;


trait DistanceTrait
{
    public function get_distance($client_lat,$client_long,$driver_lat,$driver_long){
        $R = 6371;
        $lat=(pi()/180)*($driver_lat-$client_lat);
        $lng=(pi()/180)*($driver_long-$client_long);
        $h1= sin($lat/2)*sin($lat/2)+cos((pi()/180)*$client_lat)*cos((pi()/180)*$driver_lat)*sin($lng/2)*sin($lng/2);
        $h2 = 2 *asin(min(1,sqrt($h1)));
        return $R* $h2;
    }
}
