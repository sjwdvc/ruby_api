<?php

namespace App;


class Weapon extends Model
{
    public function people(){
        return $this->hasMany(Person::class, 'weapon');
    }
}
