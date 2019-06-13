<?php

namespace App;


class Weapon extends Model
{
    public function _weapon(){
        return $this->hasOne(Person::class, 'weapon');
    }
}
