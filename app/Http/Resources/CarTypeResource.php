<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarTypeResource extends JsonResource
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
                'id' => $this->id,
                'type' => $this->type_en,
                
            ];
        } else {
            return [
                'id' => $this->id,
                'type' => $this->type_ar,


            ];
        }
    }
}
