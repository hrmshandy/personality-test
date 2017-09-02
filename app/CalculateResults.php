<?php


namespace App;


class CalculateResults
{
    protected $dimensions;
    protected $rawData;
    protected $personalityType = '';

    /**
     * CalculateResults constructor.
     */
    public function __construct($rawData)
    {
        $this->dimensions = Dimension::with('preferences')->get();
        $this->rawData = $rawData;
    }

    public function get()
    {
        $dimensions = $this->dimensions->map->preferences->map([$this, 'handlePreferences']);
        $type = $this->personalityType;
        return compact('dimensions', 'type');
    }

    public function handlePreferences($preferences)
    {
        $preferences = $preferences->map(array($this, 'calculate'));

        $this->personalityType .= $this->getDominantPref($preferences);

        return $preferences;
    }

    public function calculate($preference)
    {
        $preference = collect($preference)->only('code', 'name')->toArray();
        $data = collect($this->rawData)->filter(function($i) use($preference){
            return $i == $preference['code'];
        })->count();
        $preference['percentage'] = round(($data / 15) * 100);

        return $preference;
    }

    protected function getDominantPref($prefs)
    {
        return ($prefs[0]['percentage'] > $prefs[1]['percentage']) ? $prefs[0]['code'] : $prefs[1]['code'];
    }
}