<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeePayrollGeneration extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'employeepayroll_id',
        'payrolldate',
        'generatedby',
    
    ];
    
    
    protected $dates = [
        'payrolldate',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];

}
