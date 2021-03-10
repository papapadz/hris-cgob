<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class LeaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['unit' => 'day', 'num' => 1, 'value' => 0.041],
            ['unit' => 'day', 'num' => 2, 'value' => 0.083],
            ['unit' => 'day', 'num' => 3, 'value' => 0.125],
            ['unit' => 'day', 'num' => 4, 'value' => 0.167],
            ['unit' => 'day', 'num' => 5, 'value' => 0.208],
            ['unit' => 'day', 'num' => 6, 'value' => 0.25],
            ['unit' => 'day', 'num' => 7, 'value' => 0.292],
            ['unit' => 'day', 'num' => 8, 'value' => 0.333],
            ['unit' => 'day', 'num' => 9, 'value' => 0.375],
            ['unit' => 'day', 'num' => 10, 'value' => 0.417],
            ['unit' => 'day', 'num' => 11, 'value' => 0.458],
            ['unit' => 'day', 'num' => 12, 'value' => 0.5],
            ['unit' => 'day', 'num' => 13, 'value' => 0.542],
            ['unit' => 'day', 'num' => 14, 'value' => 0.583],
            ['unit' => 'day', 'num' => 15, 'value' => 0.625],
            ['unit' => 'day', 'num' => 16, 'value' => 0.667],
            ['unit' => 'day', 'num' => 17, 'value' => 0.708],
            ['unit' => 'day', 'num' => 18, 'value' => 0.750],
            ['unit' => 'day', 'num' => 19, 'value' => 0.792],
            ['unit' => 'day', 'num' => 20, 'value' => 0.833],
            ['unit' => 'day', 'num' => 21, 'value' => 0.875],
            ['unit' => 'day', 'num' => 22, 'value' => 0.917],
            ['unit' => 'day', 'num' => 23, 'value' => 0.958],
            ['unit' => 'day', 'num' => 24, 'value' => 1],
            ['unit' => 'day', 'num' => 25, 'value' => 1.042],
            ['unit' => 'day', 'num' => 26, 'value' => 1.083],
            ['unit' => 'day', 'num' => 27, 'value' => 1.125],
            ['unit' => 'day', 'num' => 28, 'value' => 1.167],
            ['unit' => 'day', 'num' => 29, 'value' => 1.208],
            ['unit' => 'day', 'num' => 30, 'value' => 1.25],
            ['unit' => 'hr', 'num' => 1, 'value' => 0.125],
            ['unit' => 'hr', 'num' => 2, 'value' => 0.250],
            ['unit' => 'hr', 'num' => 3, 'value' => 0.375],
            ['unit' => 'hr', 'num' => 4, 'value' => 0.5],
            ['unit' => 'hr', 'num' => 5, 'value' => 0.625],
            ['unit' => 'hr', 'num' => 6, 'value' => 0.750],
            ['unit' => 'hr', 'num' => 7, 'value' => 0.875],
            ['unit' => 'hr', 'num' => 8, 'value' => 1],
            ['unit' => 'min', 'num' => 1, 'value' => 0.002],
            ['unit' => 'min', 'num' => 2, 'value' => 0.004],
            ['unit' => 'min', 'num' => 3, 'value' => 0.006],
            ['unit' => 'min', 'num' => 4, 'value' => 0.008],
            ['unit' => 'min', 'num' => 5, 'value' => 0.010],
            ['unit' => 'min', 'num' => 6, 'value' => 0.012],
            ['unit' => 'min', 'num' => 7, 'value' => 0.015],
            ['unit' => 'min', 'num' => 8, 'value' => 0.017],
            ['unit' => 'min', 'num' => 9, 'value' => 0.019],
            ['unit' => 'min', 'num' => 10, 'value' => 0.021],
            ['unit' => 'min', 'num' => 11, 'value' => 0.023],
            ['unit' => 'min', 'num' => 12, 'value' => 0.025],
            ['unit' => 'min', 'num' => 13, 'value' => 0.027],
            ['unit' => 'min', 'num' => 14, 'value' => 0.029],
            ['unit' => 'min', 'num' => 15, 'value' => 0.031],
            ['unit' => 'min', 'num' => 16, 'value' => 0.033],
            ['unit' => 'min', 'num' => 17, 'value' => 0.035],
            ['unit' => 'min', 'num' => 18, 'value' => 0.037],
            ['unit' => 'min', 'num' => 19, 'value' => 0.040],
            ['unit' => 'min', 'num' => 20, 'value' => 0.042],
            ['unit' => 'min', 'num' => 21, 'value' => 0.044],
            ['unit' => 'min', 'num' => 22, 'value' => 0.046],
            ['unit' => 'min', 'num' => 23, 'value' => 0.048],
            ['unit' => 'min', 'num' => 24, 'value' => 0.050],
            ['unit' => 'min', 'num' => 25, 'value' => 0.052],
            ['unit' => 'min', 'num' => 26, 'value' => 0.054],
            ['unit' => 'min', 'num' => 27, 'value' => 0.056],
            ['unit' => 'min', 'num' => 28, 'value' => 0.058],
            ['unit' => 'min', 'num' => 29, 'value' => 0.060],
            ['unit' => 'min', 'num' => 30, 'value' => 0.062],
            ['unit' => 'min', 'num' => 31, 'value' => 0.065],
            ['unit' => 'min', 'num' => 32, 'value' => 0.067],
            ['unit' => 'min', 'num' => 33, 'value' => 0.069],
            ['unit' => 'min', 'num' => 34, 'value' => 0.071],
            ['unit' => 'min', 'num' => 35, 'value' => 0.073],
            ['unit' => 'min', 'num' => 36, 'value' => 0.075],
            ['unit' => 'min', 'num' => 37, 'value' => 0.077],
            ['unit' => 'min', 'num' => 38, 'value' => 0.079],
            ['unit' => 'min', 'num' => 39, 'value' => 0.081],
            ['unit' => 'min', 'num' => 40, 'value' => 0.083],
            ['unit' => 'min', 'num' => 41, 'value' => 0.085],
            ['unit' => 'min', 'num' => 42, 'value' => 0.087],
            ['unit' => 'min', 'num' => 43, 'value' => 0.090],
            ['unit' => 'min', 'num' => 44, 'value' => 0.092],
            ['unit' => 'min', 'num' => 45, 'value' => 0.094],
            ['unit' => 'min', 'num' => 46, 'value' => 0.096],
            ['unit' => 'min', 'num' => 47, 'value' => 0.098],
            ['unit' => 'min', 'num' => 48, 'value' => 0.100],
            ['unit' => 'min', 'num' => 49, 'value' => 0.102],
            ['unit' => 'min', 'num' => 50, 'value' => 0.104],
            ['unit' => 'min', 'num' => 51, 'value' => 0.106],
            ['unit' => 'min', 'num' => 52, 'value' => 0.108],
            ['unit' => 'min', 'num' => 53, 'value' => 0.110],
            ['unit' => 'min', 'num' => 54, 'value' => 0.112],
            ['unit' => 'min', 'num' => 55, 'value' => 0.115],
            ['unit' => 'min', 'num' => 56, 'value' => 0.117],
            ['unit' => 'min', 'num' => 57, 'value' => 0.119],
            ['unit' => 'min', 'num' => 58, 'value' => 0.121],
            ['unit' => 'min', 'num' => 59, 'value' => 0.123],
            ['unit' => 'min', 'num' => 60, 'value' => 0.125]
        );

        foreach($data as $d) {
            DB::table('leave_table')->insert(
                [
                    'unit' => $d['unit'],
                    'num' => $d['num'],
                    'value' => $d['value'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
