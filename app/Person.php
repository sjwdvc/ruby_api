<?php

namespace App;

class Person extends Model
{
    public function _weapon(){
        return $this->belongsTo(Weapon::class, 'weapon');
    }

    public function hero(){
        return $this->hasOne(Hero::class, 'person');
    }

    public function _armor(){
        return $this->belongsTo(Armor::class, 'armor');
    }

    public function npc(){
        return $this->hasOne(Npc::class, 'person');
    }

    public function regions(){
        return $this->hasMany(Region::class, 'holder');
    }

    public function animals(){
        return $this->hasMany(Animal::class, 'owner');
    }
}
