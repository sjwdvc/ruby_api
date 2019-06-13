<?php

namespace App;


class Region extends Model
{
    public function cities(){
        return $this->hasMany(City::class, 'region');
    }
}
