<?php

use Illuminate\Database\Seeder;

class PersonalityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Practical Supervisors', 'code' => 'ESTJ'],
            ['name' => 'Productive Realists', 'code' => 'ISTJ'],
            ['name' => 'Agile Troubleshooters', 'code' => 'ESTP'],
            ['name' => 'Adaptable Technicians', 'code' => 'ISTP'],
            ['name' => 'Caring Provider', 'code' => 'ESFJ'],
            ['name' => 'Sensible Helpers', 'code' => 'ISFJ'],
            ['name' => 'Outgoing Entertainers', 'code' => 'ESFP'],
            ['name' => 'Attentive Artisans', 'code' => 'ISFP'],
            ['name' => 'Driven Directors', 'code' => 'ENTJ'],
            ['name' => 'Strategic Masterminds', 'code' => 'INTJ'],
            ['name' => 'Inspired Inventors', 'code' => 'ENTP'],
            ['name' => 'Independent Scientists', 'code' => 'INTP'],
            ['name' => 'Inspiring Guides', 'code' => 'ENFJ'],
            ['name' => 'Compassionate Counselors', 'code' => 'INFJ'],
            ['name' => 'Expressive Advocates', 'code' => 'ENFP'],
            ['name' => 'Creative Individualists', 'code' => 'INFP']
        ];

        foreach ($types as $type) {
            \App\PersonalityType::create($type);
        }

    }
}
