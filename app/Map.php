<?php

namespace App;

class Map extends Model
{
    public function games() {
        return $this->hasMany(Game::class);
    }
}
