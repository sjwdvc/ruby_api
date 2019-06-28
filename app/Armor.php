<?php

namespace App;


class Armor extends Model
{
    public function people(){
        return $this->hasMany(Person::class, 'armor');
    }
}
