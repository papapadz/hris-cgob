<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EligibilityType extends Model
{
    protected $fillable = [
        'eligibility',
        'level',
        'description',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
}
