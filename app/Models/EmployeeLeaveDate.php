<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveDate extends Model
{
    protected $fillable = [
        'employeeleave_id',
        'leavedate',
    
    ];
    
    
    protected $dates = [
        'leavedate',
        'created_at',
        'updated_at',
    
    ];
    
    public function leave() {
        return $this->belongsTo(EmployeeLeave::class,'id','employeeleave_id')->orderBy('leavedate');
    }

}
