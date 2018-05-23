<?php

namespace App;

class Bnetaccount extends Model
{
    public function User() {
        return $this->belongsTo(User::class);
    }
}
