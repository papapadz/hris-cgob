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
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'startdate' => 'datetime:Y-m-d',
        'enddate' => 'datetime:Y-m-d',
    ];
    
    public function position() {
        return $this->hasOne(Position::class,'id','position_id');
    }

    public function employmentStat() {
        return $this->hasOne(EmploymentType::class,'id','employmenttype_id');
    }
}
