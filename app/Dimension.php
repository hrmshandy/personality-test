<?php

namespace App;

class Dimension extends Model
{

    public function preferences()
    {
        return $this->hasMany(Preference::class);
    }
}
