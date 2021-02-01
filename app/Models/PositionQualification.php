<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionQualification extends Model
{
    protected $fillable = [
        'position_id',
        'education',
        'training',
        'workexperience',
        'eligibility',
        'eligibility_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
}
