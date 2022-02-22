<?php

namespace App;


class Creature extends Model
{
    public function region(){
        return $this->belongsTo(Region::class, 'spawn');
    }
}
