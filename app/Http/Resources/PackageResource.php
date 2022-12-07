<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (isset($request->lang) && $request->lang == 'en') {
            return [
                'name' => $this->name_en,
                'description' =>$this->description_en,
                'price' =>$this->price,
                'numer_trips'=>$this->numer_trips
            ];
        } else {
            return [
                'name' => $this->name_ar,
                'description' =>$this->description_ar,
                'price' =>$this->price,
                'numer_trips'=>$this->numer_trips

            ];
        }
    }
}
