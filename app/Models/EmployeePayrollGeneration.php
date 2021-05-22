<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeePayrollGeneration extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'employeepayroll_id',
        'payroll_generation_id',
        'value',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];

    public function employeePayroll() {
        return $this->hasMany(EmployeePayroll::class,'id','employeepayroll_id')->with(['payrollItem']);
    }

    public function payrollGeneration() {
        return $this->belongsTo(PayrollGeneration::class,'payroll_generation_id','id');
    }

}
