<?php

namespace App;

class Hero extends Model
{
    public function games() 
    {
        return $this->belongsToMany(Game::class);
    }    
}
