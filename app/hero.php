<?php

namespace App;

class hero extends Model
{
    public function games() {
        return $this->belongsToMany(Game::class);
    }    
}
