<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PayrollItem;

class PayrollItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['payrollitem' => 'Basic Salary', 'type' => 1, 'description' => 'lorem ipsum'],   
            ['payrollitem' => 'Witholding Tax', 'type' => 0, 'description' => 'lorem ipsum'],
            ['payrollitem' => 'Pagibig', 'type' => 0, 'description' => 'lorem ipsum'],
            ['payrollitem' => 'GSIS', 'type' => 0, 'description' => 'lorem ipsum'],
            ['payrollitem' => 'PhilHealth', 'type' => 0, 'description' => 'lorem ipsum'],
            ['payrollitem' => 'LBP Loan', 'type' => 0, 'description' => 'lorem ipsum'],
        );

        foreach($data as $d) {
            PayrollItem::create([
                'payrollitem' => $d['payrollitem'],
                'type' => $d['type'],
                'description' => $d['description']
            ]);
        }
    }
}
