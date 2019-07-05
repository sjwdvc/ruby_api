<?php

namespace App\Http\Resources\WithRelations;

use Illuminate\Http\Resources\Json\JsonResource;

class HeroWithUser extends JsonResource
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
            'level' => $this->level,
            'health' => $this->health,
            'stamina' => $this->stamine,
            'intelligence' => $this->intelligence,
            'charisma' => $this->charisma,
            'resilience' => $this->resilience,
            'person' => $this->_person,
        ];
    }
}
