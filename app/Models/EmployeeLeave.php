<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeLeave extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'emp_id',
        'leavetype_id',
        'numdays',
        'remarks',
        'status',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
 
    public function leaveType() {
        return $this->hasOne(LeaveType::class,'id','leavetype_id');
    }

    public function leaveDays() {
        return $this->hasMany(EmployeeLeaveDate::class,'employeeleave_id','id');
    }

    public function leaveCard() {
        return $this->belongsTo(LeaveCard::class,'leave_id','id');
    }

    public function leaveDetails() {
        return $this->hasOne(LeaveCard::class,'leave_id','id');
    }
}
