<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDtr extends Model
{
    protected $table = 'employee_dtr';

    protected $fillable = [
        'emp_id',
        'dtr',
        'type',
    
    ];
    
    
    protected $dates = [
        'dtr',
        'created_at',
        'updated_at',
    
    ];

    /* ************************ ACCESSOR ************************* */

    public function employee() {
        return $this->belongsTo(Employee::class,'emp_id','emp_id');
    }
}
