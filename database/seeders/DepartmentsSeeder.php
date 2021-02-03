<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\User;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Office of the City Mayor',
            'Human Resource Management Office',
            'City Budget Office',
            'Office of the City Accountant',
            'Office of the City Planning & Development Coordinator',
            'Office of the Sangguniang Panlungsod',
            'Office of the City Social Welfare & Development Officer',
            'Office of the City Health Officer',
            'Public Employment Service Office',
            'Community Affairs and Development Office',
            'Office of the City Civil Registrar',
            'Office of the City Treasurer',
            'Office of the City Assessor',
            'Office of the Mayor – Market Section',
            'Office of the City Treasurer – Market Section',
            'Business Permits and Licenses Section',
            'Tourism and Events Section',
            'Disaster Risk Reduction Management Division',
            'Office of the City Engineer',
            'Office of the City Building Official',
            'Office of the City General Service Officer',
            'Office of the City Agriculturist',
            'Office of the City Veterinarian'
        ];

        $users = User::select('emp_id')->get();

        foreach($data as $k => $d) {
            Department::create([
                'department' => $data[$k],
                'division_id' => 1,
                'departmenthead_id' => $users[rand(0,count($users)-1)]->emp_id
            ]);
        }
    }
}
