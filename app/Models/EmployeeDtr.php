<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDtr extends Model
{
    protected $table = 'employee_dtr';

    protected $fillable = [
        'emp_id',
        'dtrdate',
        'amin',
        'amout',
        'pmin',
        'pmout'
    ];
    
    
    protected $dates = [
        'dtrdate',
        'created_at',
        'updated_at',
    
    ];

    /* ************************ ACCESSOR ************************* */

    public function employee() {
        return $this->belongsTo(Employee::class,'emp_id','emp_id');
    }
}
