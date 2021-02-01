<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeLeave extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'emp_id',
        'leavetype_id',
        'numdays',
        'remarks',
        'status',
        'vl',
        'sl',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
}
