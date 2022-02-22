<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Npc extends JsonResource
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
            'health' => $this->health,
            'profession' => $this->profession,
            'city' => $this->city,
            'person' => $this->person,
        ];
    }
}
