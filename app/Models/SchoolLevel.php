<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolLevel extends Model
{
    use HasFactory;

    public function qualification() {
        return $this->belongsTo(PositionQualification::class,'id','education');
    }

    public function employeeEducation() {
        return $this->belongsTo(EmployeeEducation::class,'id','level');
    }
}
