<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollGeneration extends Model
{
    use HasFactory;

    protected $fillable = [
        'payroll_date', 'generated_by'
    ];

    public function employeePayrollGeneration() {
        return $this->hasMany(EmployeePayrollGeneration::class,'payroll_generation_id','id')->with('employeePayroll');
    }

}
