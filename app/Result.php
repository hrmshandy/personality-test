<?php

namespace App;

class Result extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(PersonalityType::class, 'personality_type_id', 'id');
    }
}
