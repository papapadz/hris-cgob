<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveType extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'leavetype',
        'maxvalue',
        'description',
    
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    public function leave() {
        return $this->belongsTo(EmployeeLeave::class,'leavetype_id','id');
    }
}
