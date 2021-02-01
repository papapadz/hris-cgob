<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\License;

class LicensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'agency' => 'GSIS',
                'description' => 'lorem ipsum',
                'isgovernment' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'agency' => 'PAG-IBIG',
                'description' => 'lorem ipsum',
                'isgovernment' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'agency' => 'PHILHEALTH',
                'description' => 'lorem ipsum',
                'isgovernment' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'agency' => 'SSS',
                'description' => 'lorem ipsum',
                'isgovernment' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'agency' => 'TIN',
                'description' => 'lorem ipsum',
                'isgovernment' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        License::insert($data);
    }
}
