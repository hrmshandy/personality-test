<?php

namespace App\Http\Controllers;

use App\Dimension;
use App\QuestionGroup;
use Illuminate\Http\Request;

class PersonalityTestController extends Controller
{

    public function index()
    {
        $question_groups = QuestionGroup::with('questions', 'questions.preference')->take(10)->get();
        return view('personality-test', compact('question_groups'));
    }

    public function store(Request $request)
    {
        $results = $request->results;
        $dimensions = Dimension::with('preferences')->get();
        $type = '';
        $dimensions = $dimensions->map(function($dimension) use($results, &$type) {
            $collection = collect($results[$dimension->id]);
            $total = $collection->count();
            $pref = $dimension->preferences->map(function($preference) use($collection, $total) {
                $data = $collection->filter(function($i) use($preference){
                    return $i == $preference->code;
                })->count();
                $preference->precentage = ($data / $total) * 100;

                return $preference;
            });

            $type .= ($pref[0]->percentage > $pref[1]->percentage) ? $pref[0]->code : $pref[1]->code;

            return $pref;
        });

        dd($type);
    }


}
