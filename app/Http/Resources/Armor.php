<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Armor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'defense' => $this->defense,
        ];
    }
}
