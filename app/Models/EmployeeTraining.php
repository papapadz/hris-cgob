<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTraining extends Model
{
    protected $fillable = [
        'emp_id',
        'trainingtitle',
        'sponsor',
        'venue',
        'trainingtype_id',
        'hrs',
        'startdate',
        'enddate',
        'address_id',
    
    ];
    
    
    protected $dates = [
        'startdate',
        'enddate',
        'created_at',
        'updated_at',
    
    ];
    
    public function trainingType() {
        return $this->hasOne(TrainingType::class,'id','trainingtype_id');
    }

}
