<?php

namespace App;


class City extends Model
{
    public function _region(){
        return $this->belongsTo(Region::class, 'region');
    }

    public function npcs(){
        return $this->hasMany(Npc::class, 'city');
    }
}
