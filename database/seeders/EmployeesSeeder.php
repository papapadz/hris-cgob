<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Employee;
use App\Models\User;
use App\Models\CivilStatus;
use App\Models\Citizenship;
use App\Models\Barangay;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extensions = ['','Jr.','Sr.','I','II','III'];
        $users = User::select('emp_id')->get();
        $faker = Faker::create();
        $civilstat = CivilStatus::select('id')->get();
        $citizenship = Citizenship::select('id')->get();
        $barangays = Barangay::select('id')->get();
        $gender = ['M','F'];
        $bloodtype = ['A','B','AB','O'];

        foreach($users as $user) {
            Employee::create([
                'emp_id' => $user->emp_id,
                'lastname' => $faker->lastName,
                'firstname' => $faker->firstName,
                'middlename' => $faker->lastName,
                'extension' => $extensions[rand(0,count($extensions)-1)],
                'birthdate' => $faker->date,
                'birthplace' => $faker->city,
                'address_id' => $barangays[rand(0,count($barangays)-1)]->id,
                'civilstat_id' => $civilstat[rand(0,count($civilstat)-1)]->id,
                'citizenship_id' => $citizenship[rand(0,count($citizenship)-1)]->id,
                'gender' => $gender[rand(0,1)],
                'height' => rand(1,2) / 10,
                'weight' => rand(45,100),
                'bloodtype' => $bloodtype[rand(0,3)],
                'image_url' => $faker->imageUrl(640,480)
            ]);
        }
    }
}
