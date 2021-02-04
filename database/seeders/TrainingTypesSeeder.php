<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingType;
use Faker\Factory as Faker;

class TrainingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Managerial','Technical','Supervisory','Others'
        ];
        $faker = Faker::create();
        foreach($data as $d) {
            TrainingType::create([
                'trainingtype' => $d,
                'description' => $faker->sentence
            ]);
        }
    }
}
