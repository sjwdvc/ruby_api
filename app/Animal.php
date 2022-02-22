<?php

namespace App;

class Animal extends Model
{
    public function person(){
        return $this->belongsTo(Person::class, 'owner');
    }
}
