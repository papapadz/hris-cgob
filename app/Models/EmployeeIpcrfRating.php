<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeIpcrfRating extends Model
{
    protected $fillable = [
        'ipcrf_id',
        'selfrating',
        'supervisorrating',
        'itemtype',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
}
