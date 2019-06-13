<?php

namespace App;


class Region extends Model
{
    public function cities(){
        return $this->hasMany(City::class, 'region');
    }

    public function creatures(){
        return $this->hasMany(Creature::class, 'spawn');
    }

    public function person(){
        return $this->belongsTo(Person::class, 'holder');
    }
}
