<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeMembership extends Model
{
    protected $fillable = [
        'emp_id',
        'membership',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
}
