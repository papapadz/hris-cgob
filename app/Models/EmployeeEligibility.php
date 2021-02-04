<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeEligibility extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'emp_id',
        'eligibilitytype_id',
        'rating',
        'licensenum',
        'startdate',
        'enddate',
        'place',
        'file_url',
    
    ];
    
    protected $dates = [
        'startdate',
        'enddate',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];

    public function eligibilityType() {
        return $this->hasOne(EligibilityType::class,'id','eligibilitytype_id');
    }

}
