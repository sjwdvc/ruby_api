<?php

namespace App;


class Armor extends Model
{
    public function person(){
        return $this->hasOne(Person::class, 'armor');
    }
}
