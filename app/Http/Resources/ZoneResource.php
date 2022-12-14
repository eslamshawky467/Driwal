<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ZoneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        'id' => $this->id,
        'name' => $this->name,
        'distance'=> $this->distance,
        'from_time'=> $this->from_time,
        'to_time'=>$this->to_time,
        'distance_time_price'=>$this->distance_time_price,
        'package_id'=>$this->package_id,
        ];
    }
}
