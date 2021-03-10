<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeIpcrfRating extends Model
{
    protected $table='ipcr_ratings';

    protected $fillable = [
        'ipcr_id',
        'rating_by',
        'quality',
        'effectiveness',
        'timeliness',
        'remarks',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',

    ];
    
    public function ipcrf() {
        return $this->belongsTo(EmployeeIpcrf::class,'id','ipcr_id');
    }

    public function employee() {
        return $this->hasOne(Employee::class,'emp_id','rating_by');
    }

}
