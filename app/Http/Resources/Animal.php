<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Animal extends JsonResource
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
            'type' => $this->type,
            'speed' => $this->speed,
            'defense' => $this->defense,
            'loyalty' => $this->loyalty,
            'owner' => $this->owner,
        ];
    }
}
