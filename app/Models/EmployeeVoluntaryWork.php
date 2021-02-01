<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeVoluntaryWork extends Model
{
    protected $fillable = [
        'emp_id',
        'organization',
        'startdate',
        'enddate',
        'hrs',
    
    ];
    
    
    protected $dates = [
        'startdate',
        'enddate',
        'created_at',
        'updated_at',
    
    ];
    
}
