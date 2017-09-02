<?php

namespace App;


class Preference extends Model
{

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
