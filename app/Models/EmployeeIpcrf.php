<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeIpcrf extends Model
{
    use SoftDeletes;
    protected $table = 'employee_ipcrf';

    protected $fillable = [
        'emp_id',
        'target',
        'accomplishment',
        'ipcrfdate',
        'remarks',
        'type'
    ];
    
    
    protected $dates = [
        'ipcrfdate',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    public function rating() {
        return $this->hasOne(EmployeeIpcrfRating::class,'ipcrf_id','id');
    }
}
