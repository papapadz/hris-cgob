<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeContactDetail extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'emp_id',
        'type',
        'contact',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    /* ************************ ACCESSOR ************************* */

    public function employee() {
        return $this->belongsTo(Employee::class,'emp_id','emp_id');
    }
}
