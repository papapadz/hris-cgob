<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeHobby extends Model
{
    protected $fillable = [
        'emp_id',
        'hobby',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
}
