<?php

namespace App\Http\Controllers\Api;

use App\CalculateResults;
use App\PersonalityType;
use App\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ResultsController extends Controller
{
    public function __invoke(Request $request)
    {
        $calc = (new CalculateResults($request->results))->get();
        $type = PersonalityType::where('code', $calc['type'])->first();
        $result = Result::create([
            'user_id' => 1,
            'personality_type_id' => $type->id,
            'results' => json_encode($calc['dimensions'])
        ]);
        return response()->json(['result_id' => $result->id, 'type' => Str::lower($calc['type'])]);
    }
}
