<?php

namespace App;

class Game extends Model
{
    public function map() {
        return $this->belongsTo(Map::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function heroes() {
        return $this->belongsToMany(hero::class);
    }


}
