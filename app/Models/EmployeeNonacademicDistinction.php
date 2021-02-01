<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeNonacademicDistinction extends Model
{
    protected $fillable = [
        'emp_id',
        'distinction',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

}
