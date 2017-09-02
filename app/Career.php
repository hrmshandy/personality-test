<?php

namespace App;

class Career extends Model
{

    public function personality_type()
    {
        return $this->belongsTo(PersonalityType::class);
    }
}
