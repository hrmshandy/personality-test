<?php

namespace App\Http\Controllers\Api;

use App\QuestionGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function __invoke()
    {
        return QuestionGroup::with('questions', 'questions.preference')->get();
    }
}
