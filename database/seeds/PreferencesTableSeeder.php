<?php

use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preferences = [
            ['name' => 'Introverts', 'code' => 'I', 'dimension_id' => 1],
            ['name' => 'Extroverts', 'code' => 'E', 'dimension_id' => 1],
            ['name' => 'Sensors', 'code' => 'S', 'dimension_id' => 2],
            ['name' => 'Intuitives', 'code' => 'N', 'dimension_id' => 2],
            ['name' => 'Thinkers', 'code' => 'T', 'dimension_id' => 3],
            ['name' => 'Feelers', 'code' => 'F', 'dimension_id' => 3],
            ['name' => 'Perceivers', 'code' => 'P', 'dimension_id' => 4],
            ['name' => 'Judgers', 'code' => 'J', 'dimension_id' => 4],
        ];

        foreach ($preferences as $preference) {
            \App\Preference::create($preference);
        }
    }
}
