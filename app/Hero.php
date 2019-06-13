<?php

namespace App;


class Hero extends Model
{
    public function _person(){
        return $this->belongsTo(Person::class, 'person');
    }
}
