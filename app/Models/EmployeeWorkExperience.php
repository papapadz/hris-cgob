<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkExperience extends Model
{
    protected $fillable = [
        'emp_id',
        'position_id',
        'company',
        'startdate',
        'enddate',
        'salary',
        'sg',
        'step',
        'employmenttype_id',
        'isgovernment',
    
    ];
    
    
    protected $dates = [
        'startdate',
        'enddate',
        'created_at',
        'updated_at',
    
    ];
    
}
