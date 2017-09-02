<?php

use Illuminate\Database\Seeder;

class DimensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dimensions = [
            ['name' => 'Energy Style'],
            ['name' => 'Thinking Style'],
            ['name' => 'Values Style'],
            ['name' => 'Life Style'],
        ];

        foreach ($dimensions as $dimension) {
            \App\Dimension::create($dimension);
        }
    }
}
