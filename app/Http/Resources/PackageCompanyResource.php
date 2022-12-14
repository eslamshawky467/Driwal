<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageCompanyResource extends JsonResource
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
                'name'=> $this->Package->name_en,
                'number trips' =>$this->Package->number_trips,
                'remaining trips' =>$this->Package->remaining_trips,
            ];
        } else {
            return [
                'name' => $this->Package->name_ar,
                'number trips' =>$this->Package->number_trips,
                'remaining trips' =>$this->Package->remaining_trips,
            ];
        }
    }
}
