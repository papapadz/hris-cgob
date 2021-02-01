<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeFamily extends Model
{
    protected $table = 'employee_family';

    protected $fillable = [
        'emp_id',
        'lastname',
        'firstname',
        'middlename',
        'extension',
        'birthdate',
        'address_id',
        'contact',
        'occupation',
        'workaddress_id',
        'type',
    
    ];
    
    
    protected $dates = [
        'birthdate',
        'created_at',
        'updated_at',
    
    ];
    
}
