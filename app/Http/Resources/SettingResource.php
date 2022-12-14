<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
                'title' => $this->title_en,
                'description' => $this->description_en,
                'icon'=> $this->icon,
                'type'=> $this->type,
            ];
        } else {
            return [
                'title' => $this->title_ar,
                'description' => $this->description_ar,
                'icon'=> $this->icon,
                'type'=> $this->type,
            ];
        }
    }
}
