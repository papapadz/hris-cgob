<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['course'=>'Elementary','level'=>1],
            ['course'=>'High School','level'=>2],
            ['course'=>'BS in Computer Science','level'=>3],
            ['course'=>'Master in Information Technology','level'=>4],
        );

        foreach($data as $d) {
            Course::create([
                'course' => $d['course'],
                'level' => $d['level']
            ]);
        }
    }
}
