<?php

namespace App;

class PersonalityType extends Model
{

    public function careers()
    {
        return $this->hasMany(Career::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
