<?php

namespace App;

class Question extends Model
{

    public function preference()
    {
        return $this->belongsTo(Preference::class);
    }
}
