<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmploymentType;

class EmploymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Permanent','Part Time','Contractual','Contract of Service','Co-Terminus','Temporary'];
        foreach($data as $k => $d) {
            EmploymentType::create([
                'employmenttype' => $data[$k],
                'description' => 'lorem ipsum'
            ]);
        }
    }
}
