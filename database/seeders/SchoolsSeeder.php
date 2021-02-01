<?php

use Illuminate\Database\Seeder;
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
            ['school' => 'Mariano Marcos State University - Main Campus','address_id'=>12805036,'level'=>123,'ispublic'=>true],
            ['school' => 'Mariano Marcos State University - College of Teacher Education (CTE)','address_id'=>12812059,'level'=>3,'ispublic'=>true],
            ['school' => 'Mariano Marcos State University - College of Industrial Technology (CIT)','address_id'=>12812059,'level'=>3,'ispublic'=>true],
            ['school' => 'Mariano Marcos State University - College of Aquatic Sciences and Applied Technology (CASAT)','address_id'=>12808016,'level'=>3,'ispublic'=>true],
            ['school' => 'Mariano Marcos State University - College of Agriculture, Forestry and Sustainable Development (CAFSD)','address_id'=>12809016,'level'=>3,'ispublic'=>true],
            ['school' => 'Northwestern University','address_id'=>12812082,'level'=>123,'ispublic'=>false],
            ['school' => 'Divine Word College of Laoag','address_id'=>12812045,'level'=>123,'ispublic'=>false],
            ['school' => 'Data Center College of the Philippines of Laoag City, Inc.','address_id'=>12812070,'level'=>3,'ispublic'=>false],
        ]);
    }
}
