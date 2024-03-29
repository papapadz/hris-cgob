<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use App\Models\School;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::insert([
            ['school' => 'Mariano Marcos State University - Main Campus','address_id'=>12805036,'level'=>12345,'ispublic'=>true],
            ['school' => 'Mariano Marcos State University - College of Teacher Education (CTE)','address_id'=>12812059,'level'=>4,'ispublic'=>true],
            ['school' => 'Mariano Marcos State University - College of Industrial Technology (CIT)','address_id'=>12812059,'level'=>34,'ispublic'=>true],
            ['school' => 'Mariano Marcos State University - College of Aquatic Sciences and Applied Technology (CASAT)','address_id'=>12808016,'level'=>4,'ispublic'=>true],
            ['school' => 'Mariano Marcos State University - College of Agriculture, Forestry and Sustainable Development (CAFSD)','address_id'=>12809016,'level'=>4,'ispublic'=>true],
            ['school' => 'Northwestern University','address_id'=>12812082,'level'=>124,'ispublic'=>false],
            ['school' => 'Divine Word College of Laoag','address_id'=>12812045,'level'=>1234,'ispublic'=>false],
            ['school' => 'Data Center College of the Philippines of Laoag City, Inc.','address_id'=>12812070,'level'=>34,'ispublic'=>false],
        ]);

        DB::table('school_levels')->insert([
            ['id' => 1, 'level' => 'Elementary','created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
            ['id' => 2, 'level' => 'High School','created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
            ['id' => 3, 'level' => 'Vocational','created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
            ['id' => 4, 'level' => 'College','created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
            ['id' => 5, 'level' => 'Graduate Studies','created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
        ]);
    }
}
