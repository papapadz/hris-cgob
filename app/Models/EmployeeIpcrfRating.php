<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeIpcrfRating extends Model
{
    protected $fillable = [
        'ipcrf_id',
        'selfrating',
        'supervisorrating',
        'supervisor',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',

    ];
    
    public function ipcrf() {
        return $this->belongsTo(EmployeeIpcrf::class,'id','ipcrf_id');
    }

    public function supervisor() {
        return $this->hasOne(Employee::class,'emp_id','supervisor');
    }
}
