<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'department',
        'division_id',
        'deparmenthead_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    public function appointment() {
        return $this->belongsTo(Appointment::class,'department_id','id');
    }
}
