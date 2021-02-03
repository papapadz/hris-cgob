<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Citizenship;

class CitizenshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'citizenship' => 'Filipino',
                'country' => 'Philippines'
            ]
        );

        Citizenship::create($data);
    }
}
