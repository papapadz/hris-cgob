<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeIpcrf extends Model
{
    use SoftDeletes;
    protected $table = 'employee_ipcr';

    protected $fillable = [
        'emp_id',
        'type_id',
        'target',
        'accomplishment',
        'mfo_id',
        'period_id'
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    public function ratings() {
        return $this->hasMany(EmployeeIpcrfRating::class,'ipcr_id','id');
    }

    public function ipcrtype() {
        return $this->hasOne(IPCRType::class,'id','type_id');
    }

    public function mfo() {
        return $this->belongsTo(MFO::class,'mfo_id','id')->with('functiontype');
    }

    public function period() {
        return $this->hasOne(IPCRPeriod::class,'id','period_id');
    }

}
