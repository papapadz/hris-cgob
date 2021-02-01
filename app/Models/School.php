<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'school',
        'address_id',
        'level',
        'ispublic',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];

    /* ************************ ACCESSOR ************************* */

    public function address() {
        return $this->hasOne(Barangay::class,'id','address_id')->with('town');
    }

    public function employeeEducations() {
        return $this->belongsTo(EmployeeEducation::class,'id','school_id');
    }
}
