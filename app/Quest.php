<?php

namespace App;


class Quest extends Model
{
    public function npc(){
        return $this->belongsTo(Npc::class, 'publisher');
    }
}
