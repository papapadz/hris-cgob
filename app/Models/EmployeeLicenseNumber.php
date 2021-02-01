<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeLicenseNumber extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'emp_id',
        'license_id',
        'licenseno',
        'issuedate',
        'expirydate',
    
    ];
    
    
    protected $dates = [
        'issuedate',
        'expirydate',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
}
