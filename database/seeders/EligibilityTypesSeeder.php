<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EligibilityType;
use Faker\Factory as Faker;

class EligibilityTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $data = array(
            ['eligibility'=>'RA 1080 (Architect)', 'level' => 3],
            ['eligibility'=>'RA 1080 (Certified Public Accountant)', 'level' => 3],
            ['eligibility'=>'RA 1080 (Chemical Engineer)', 'level' => 3],
            ['eligibility'=>'RA 1080 (Civil Engineer)','level' => 3],
            ['eligibility'=>'RA 1080 (Criminologist)','level' => 3],
            ['eligibility'=>'RA 1080 (Dentist)','level' => 3],
            ['eligibility'=>'RA 1080 (Electronics and Communications Engineer)','level' => 3],
            ['eligibility'=>'RA 1080 (Master Plumber)','level' => 3],
            ['eligibility'=>'RA 1080 (Mechanical Engineer)','level' => 3],
            ['eligibility'=>'RA 1080 (Medical Laboratory Technician)','level' => 3],
            ['eligibility'=>'RA 1080 (Medical Technologist)','level' => 3],
            ['eligibility'=>'RA 1080 (Midwife)','level' => 3],
            ['eligibility'=>'RA 1080 (Nurse)','level' => 3],
            ['eligibility'=>'RA 1080 (Nutritionist Dietitian)','level' => 3],
            ['eligibility'=>'RA 1080 (Pharmacist)','level' => 3],
            ['eligibility'=>'RA 1080 (Physical Therapist)','level' => 3],
            ['eligibility'=>'RA 1080 (Physical Therapist Technician)','level' => 3],
            ['eligibility'=>'RA 1080 (Physician)','level' => 3],
            ['eligibility'=>'RA 1080 (Registered Electrical Engineer)','level' => 3],
            ['eligibility'=>'RA 1080 (Pyschologist)','level' => 3],
            ['eligibility'=>'RA 1080 (Psychometrician)','level' => 3],
            ['eligibility'=>'RA 1080 (Radiologic Technologist)','level' => 3],
            ['eligibility'=>'RA 1080 (Respiratory Therapist)','level' => 3],
            ['eligibility'=>'RA 1080 (X-ray Technologist)','level' => 3],
            ['eligibility'=>'Barangay Official Eligibility','level' => 2],
            ['eligibility'=>'Honor Graduate Eligibility','level' => 3],
            ['eligibility'=>'Career Service Eligibility - Professional','level' => 3],
            ['eligibility'=>'Career Service Eligibility - Sub-Professional','level' => 2],
            ['eligibility'=>'TESDA NC II - Automotive Servicing','level' => 2],
            ['eligibility'=>'TESDA NC II - Biomedical Equipment Services','level' => 2],
            ['eligibility'=>'TESDA NC II - Caregiving','level' => 2],
            ['eligibility'=>'TESDA NC II - Carpentry','level' => 2],
            ['eligibility'=>'TESDA NC II - Computer Systems Servicing','level' => 2],
            ['eligibility'=>'TESDA NC II - Cookery','level' => 2],
            ['eligibility'=>'TESDA NC II - Customer Services','level' => 2],
            ['eligibility'=>'TESDA NC II - Dress Making','level' => 2],
            ['eligibility'=>'TESDA NC II - Driving','level' => 2],
            ['eligibility'=>'TESDA NC II - Electrical Installation and Maintenance','level' => 2],
            ['eligibility'=>'TESDA NC II - Massage Therapy','level' => 2],
            ['eligibility'=>'TESDA NC I - Plumbing','level' => 2],
            ['eligibility'=>'TESDA NC II - Refrigeration and Airconditioning Servicing','level' => 2],
            ['eligibility'=>'Drivers License','level' => 1],
        );

        $faker = Faker::create();

        foreach($data as $k => $d) {
            EligibilityType::create([
                'eligibility' => $d['eligibility'],
                'level' => $d['level'],
                'description' => $faker->sentence
            ]);
        }
    }
}
