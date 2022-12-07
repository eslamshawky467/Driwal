<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarModelResource extends JsonResource
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
                'model' => $this->model,
                
            ];
        } else {
            return [
                'id' => $this->id,
                'model' => $this->model,


            ];
        }
    }
}
