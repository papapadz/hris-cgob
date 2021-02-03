<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Plantilla;
use App\Models\EmploymentType;
use App\Models\AppointmentType;
use App\Models\Department;

class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::select('emp_id')->get();
        $plantilla = Plantilla::select('id')->get();
        $employmenttypes = EmploymentType::select('id')->get();
        $appointmenttypes = AppointmentType::select('id')->get();
        $departments = Department::select('id')->get();
        $faker = Faker::create();

        foreach($plantilla as $k => $p) {

            if($k<count($users)) {
                
                Appointment::create([
                    'emp_id' => $users[$k]->emp_id,
                    'plantilla_id'=> $p->id,
                    'step' => rand(1,7),
                    'employmenttype_id' => $employmenttypes[rand(0,count($employmenttypes)-1)]->id,
                    'appointmenttype_id' => $appointmenttypes[rand(0,count($appointmenttypes)-1)]->id,
                    'startdate' => $faker->date,
                    'department_id' => $departments[rand(0,count($departments)-1)]->id,
                ]);
            } else
                break;

        }
    }
}
