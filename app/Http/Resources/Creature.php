<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class Creature extends JsonResource
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
            'attack' => $this->attack,
            'defense' => $this->defense,
            'max_health' => $this->max_health,
            'health' => $this->health,
            'gold' => $this->gold,
            'experience' => $this->experience,
            'spawn' => $this->spawn,
        ];
    }
}
