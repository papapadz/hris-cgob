<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'emp_id',
        'plantilla_id',
        'step',
        'employmenttype_id',
        'appointmenttype_id',
        'vice_id',
        'startdate',
        'enddate',
        'department_id',
    ];
    
    
    protected $dates = [
        'startdate',
        'enddate',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];

    /* ************************ ACCESSOR ************************* */

    public function department() {
        return $this->hasOne(Department::class,'id','department_id');
    }

    public function plantilla() {
        return $this->hasOne(Plantilla::class,'id','plantilla_id')->with('position');
    }

    public function employmentStat() {
        return $this->hasOne(EmploymentType::class,'id','appointmenttype_id');
    }

    public function employee() {
        return $this->belongsTo(Employee::class,'emp_id');
    }
}
