<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppointmentType;

class AppointmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Original','Reemployment','Reappointment','Secondment'];
        foreach($data as $k => $d) {
            AppointmentType::create([
                'appointmenttype' => $data[$k],
                'description' => 'lorem ipsum'
            ]);
        }
    }
}
