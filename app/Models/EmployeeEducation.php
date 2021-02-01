<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeEducation extends Model
{
    use SoftDeletes;
    protected $table = 'employee_educations';
    protected $fillable = [
        'emp_id',
        'level',
        'school_id',
        'course_id',
        'yearstarted',
        'yeargraduated',
        'units',
        'honors',
        'file_url',
    
    ];
    
    
    protected $dates = [
        'yearstarted',
        'yeargraduated',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];

    /* ************************ ACCESSOR ************************* */

    public function employee() {
        return $this->belongsTo(Employee::class,'emp_id','emp_id');
    }

    public function school() {
        return $this->hasOne(School::class,'id','school_id')->with('employeeEducation');
    }

    public function course() {
        return $this->hasOne(Course::class,'id','course_id');
    }
}
