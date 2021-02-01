<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeUserAccount extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'emp_id',
        'password',
        'level',
    
    ];
    
    protected $hidden = [
        'password',
    
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
}
