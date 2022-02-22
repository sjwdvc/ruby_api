<?php

namespace App;


class Npc extends Model
{
    public function _city(){
        return $this->belongsTo(City::class, 'city');
    }

    public function _person(){
        return $this->belongsTo(Person::class, 'person');
    }

    public function quests(){
        return $this->hasMany(Quest::class, 'publisher');
    }
}
