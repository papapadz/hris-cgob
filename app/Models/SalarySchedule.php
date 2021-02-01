<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalarySchedule extends Model
{
    protected $table = 'salary_schedule';

    protected $fillable = [
        'sg',
        'step',
        'value',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
}
