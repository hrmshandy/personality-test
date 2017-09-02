<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function __invoke($id)
    {
        $result = Result::with('type')->find($id);
        return view('results', compact('result'));
    }
}
