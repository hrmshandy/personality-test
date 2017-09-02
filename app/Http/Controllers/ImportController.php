<?php

namespace App\Http\Controllers;

use App\Preference;
use App\Question;
use App\QuestionGroup;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    protected $preferences;
    /**
     * ImportController constructor.
     */
    public function __construct()
    {
        $this->preferences = Preference::select('id', 'code')->get();
    }

    public function __invoke()
    {
        Excel::selectSheetsByIndex(0)->load(storage_path('app/mbti.ods'), function($reader) {

            // Getting all results
            $results = $reader->get()->map->map([$this, 'format'])->map([$this, 'saving']);

            dd($results->toArray());

        });
    }

    public function format($deepItem) {
        foreach ($this->preferences as $preference) {
            if(str_contains($deepItem, $pattern = '['.$preference->code.']')) {
                return new Question([
                    'preference_id' => $preference->id,
                    'question' => str_replace($pattern, '', $deepItem)
                ]);
            }
        }
    }

    public function saving($items)
    {
        $group = new QuestionGroup();
        $group->save();
        $group->questions()->saveMany($items);
        return $group;
    }
}
