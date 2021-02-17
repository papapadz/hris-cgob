<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkExperience extends Model
{
    protected $fillable = [
        'emp_id',
        'position_id',
        'company',
        'startdate',
        'enddate',
        'salary',
        'sg',
        'step',
        'employmenttype_id',
        'isgovernment',
    
    ];
    
    protected $dates = [
        'startdate',
        'enddate',
        'created_at',
        'updated_at',
    
    ];
    
    public function position() {
        return $this->hasOne(Position::class,'id','position_id');
    }

    public function employmentStat() {
        return $this->hasOne(EmploymentType::class,'id','employmenttype_id');
    }
}
