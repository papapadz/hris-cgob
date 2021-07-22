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
        //'address_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $casts = [
        'startdate' => 'datetime:Y-m-d',
        'enddate' => 'datetime:Y-m-d',
    ];

    public function trainingType() {
        return $this->hasOne(TrainingType::class,'id','trainingtype_id');
    }

}
