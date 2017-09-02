<?php

namespace App;


class QuestionGroup extends Model
{

    public function questions()
    {
        return $this->hasMany(Question::class, 'group_id', 'id');
    }
}
