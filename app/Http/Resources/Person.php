<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Person extends JsonResource
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
            'name' => $this->name,
            'sex' => $this->sex,
            'max_health' => $this->max_health,
            'attack' => $this->attack,
            'defense' => $this->defense,
            'agility' => $this->agility,
            'experience' => $this->experience,
            'gold' => $this->gold,
            'weapon' => $this->weapon,
            'armor' => $this->armor,
        ];
    }
}
